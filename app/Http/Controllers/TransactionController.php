<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Dessert;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('dessert')->paginate(10);
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $desserts = Dessert::all();
        return view('transactions.create', compact('desserts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'id_dessert' => 'required|exists:desserts,id_dessert',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pesanan' => 'required|date',
            'status' => 'required|string',
        ]);

        $dessert = Dessert::findOrFail($request->id_dessert);
        $total_harga = $dessert->harga * $request->jumlah;

        Transaction::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'id_dessert' => $request->id_dessert,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
            'tanggal_pesanan' => $request->tanggal_pesanan,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $desserts = Dessert::all();
        return view('transactions.edit', compact('transaction', 'desserts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'id_dessert' => 'required|exists:desserts,id_dessert',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pesanan' => 'required|date',
            'status' => 'required|string',
        ]);

        $transaction = Transaction::findOrFail($id);
        $dessert = Dessert::findOrFail($request->id_dessert);
        $total_harga = $dessert->harga * $request->jumlah;

        $transaction->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'id_dessert' => $request->id_dessert,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
            'tanggal_pesanan' => $request->tanggal_pesanan,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.transactions.index')->with('success', 'Transaksi berhasil diubah.');
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('admin.transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
