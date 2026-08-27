<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index(Request $request)
    {
        $query = Penjualan::with(['user', 'details.produk'])->latest();

        if ($request->filled('search')) {
            $query->where('kode_transaksi', 'like', '%' . $request->search . '%');
        }

        $penjualans = $query->take(10)->get();

        return view('penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $produks = Produk::where('stok', '>', 0)->get();
        return view('penjualan.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk_id'         => 'required|array',
            'produk_id.*'       => 'required|exists:produk,id',
            'jumlah'            => 'required|array',
            'jumlah.*'          => 'required|numeric|min:1',
            'metode_pembayaran' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            $totalPembayaran = 0;
            $items = [];

            foreach ($request->produk_id as $index => $id) {
                $produk = Produk::findOrFail($id);
                $qty    = $request->jumlah[$index];
                $subtotal = $produk->harga_jual * $qty;

                $totalPembayaran += $subtotal;

                $items[] = [
                    'produk_id'    => $id,
                    'kuantitas'    => $qty,
                    'harga_satuan' => $produk->harga_jual,
                    'subtotal'     => $subtotal,
                ];
            }

            $penjualan = Penjualan::create([
                'user_id'           => Auth::id(),
                'metode_pembayaran' => $request->metode_pembayaran,
                'total_pembayaran'  => $totalPembayaran,
                'status'            => 'completed',
            ]);

            foreach ($items as $item) {
                $penjualan->details()->create($item);
                Produk::where('id', $item['produk_id'])->decrement('stok', $item['kuantitas']);
            }

            DB::commit();

            return redirect()->route('penjualan.index')
                ->with('success', 'Transaksi berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menyimpan transaksi: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $penjualan = Penjualan::with(['user', 'details.produk'])->findOrFail($id);

        return view('penjualan.show', compact('penjualan'));
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::with('details')->findOrFail($id);

        if (strtolower($penjualan->status) === 'completed') {
            return back()->with('error', 'Transaksi yang sudah Completed tidak dapat dihapus.');
        }

        DB::beginTransaction();

        try {
            foreach ($penjualan->details as $item) {
                Produk::where('id', $item->produk_id)
                    ->increment('stok', $item->kuantitas);
            }

            $penjualan->details()->delete();
            $penjualan->delete();

            DB::commit();

            return back()->with('success', 'Transaksi berhasil dihapus dan stok dikembalikan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menghapus transaksi.');
        }
    }
}