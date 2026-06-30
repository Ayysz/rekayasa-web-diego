@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6 max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Edit Menu Dessert</h2>
        <a href="{{ route('desserts.index') }}" class="text-blue-500 hover:underline">Kembali</a>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('desserts.update', $dessert->id_dessert) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar (URL)</label>
            <input type="text" name="gambar" id="gambar" value="{{ old('gambar', $dessert->gambar) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2" required>
        </div>

        <div class="mb-4">
            <label for="nama_dessert" class="block text-sm font-medium text-gray-700">Nama Dessert</label>
            <input type="text" name="nama_dessert" id="nama_dessert" value="{{ old('nama_dessert', $dessert->nama_dessert) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2" required>
        </div>

        <div class="mb-4">
            <label for="komposisi" class="block text-sm font-medium text-gray-700">Komposisi</label>
            <textarea name="komposisi" id="komposisi" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2" required>{{ old('komposisi', $dessert->komposisi) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="harga" class="block text-sm font-medium text-gray-700">Harga (Rp)</label>
            <input type="number" name="harga" id="harga" value="{{ old('harga', $dessert->harga) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2" required>
        </div>

        <div class="mb-6">
            <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
            <input type="text" name="kategori" id="kategori" value="{{ old('kategori', $dessert->kategori) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2" required>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
