<?php

namespace App\Http\Controllers;

use App\Models\Dessert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DessertController extends Controller
{
    public function index()
    {
        $desserts = Dessert::all();
        return view('desserts.index', compact('desserts'));
    }

    public function exportPdf()
    {
        $desserts = Dessert::all();
        
        if ($desserts->isEmpty()) {
            return redirect()->route('admin.desserts.index')->with('error', 'Tidak ada data untuk diexport.');
        }

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::setOptions(['isRemoteEnabled' => true])
            ->loadView('desserts.pdf', compact('desserts'));
        $pdf->setPaper('A4', 'landscape');
        
        return $pdf->download('Data_Master_Dessert.pdf');
    }

    public function create()
    {
        return view('desserts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp,avif|max:2048',
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
            'gambar.image' => 'File harus berupa gambar.',
        ]);

        $data = $request->except('gambar');

        // Cloudinary upload via Storage
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('desserts', 'cloudinary');
            $data['gambar'] = Storage::disk('cloudinary')->url($path);
        }

        Dessert::create($data);

        return redirect()->route('admin.desserts.index')->with('success', 'Data Dessert berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $dessert = Dessert::findOrFail($id);
        return view('desserts.edit', compact('dessert'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_dessert' => 'required|string|max:255',
            'komposisi' => 'required|string',
            'harga' => 'required|numeric',
            'kategori' => 'required|string|max:255',
        ]);

        $dessert = Dessert::findOrFail($id);
        $data = $request->except('gambar');

        // Cloudinary upload if new image via Storage
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('desserts', 'cloudinary');
            $data['gambar'] = Storage::disk('cloudinary')->url($path);
        }

        $dessert->update($data);

        return redirect()->route('admin.desserts.index')->with('success', 'Data Dessert berhasil diubah.');
    }

    public function destroy($id)
    {
        $dessert = Dessert::findOrFail($id);
        $dessert->delete();

        return redirect()->route('admin.desserts.index')->with('success', 'Data Dessert berhasil dihapus.');
    }
}
