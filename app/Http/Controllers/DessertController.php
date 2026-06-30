<?php

namespace App\Http\Controllers;

use App\Models\Dessert;
use Illuminate\Http\Request;

class DessertController extends Controller
{
    public function index()
    {
        $desserts = Dessert::all();
        return view('desserts.index', compact('desserts'));
    }

    public function create()
    {
        return view('desserts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required',
            'nama_dessert' => 'required|string|max:255',
            'komposisi' => 'required|string',
            'harga' => 'required|numeric',
            'kategori' => 'required|string|max:255',
        ], [
            'nama_dessert.required' => 'Nama Dessert tidak boleh kosong.',
            'komposisi.required' => 'Komposisi tidak boleh kosong.',
            'harga.required' => 'Harga tidak boleh kosong.',
            'kategori.required' => 'Kategori tidak boleh kosong.',
            'gambar.required' => 'Gambar tidak boleh kosong.',
        ]);

        Dessert::create($request->all());

        return redirect()->route('desserts.index')->with('success', 'Data Dessert berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $dessert = Dessert::findOrFail($id);
        return view('desserts.edit', compact('dessert'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'required',
            'nama_dessert' => 'required|string|max:255',
            'komposisi' => 'required|string',
            'harga' => 'required|numeric',
            'kategori' => 'required|string|max:255',
        ]);

        $dessert = Dessert::findOrFail($id);
        $dessert->update($request->all());

        return redirect()->route('desserts.index')->with('success', 'Data Dessert berhasil diubah.');
    }

    public function destroy($id)
    {
        $dessert = Dessert::findOrFail($id);
        $dessert->delete();

        return redirect()->route('desserts.index')->with('success', 'Data Dessert berhasil dihapus.');
    }
}
