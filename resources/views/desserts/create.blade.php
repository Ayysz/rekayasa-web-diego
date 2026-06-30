@extends('layouts.admin')

@section('content')
<div class="bg-white shadow rounded-lg p-6 max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Tambah Menu Dessert</h2>
        <a href="{{ route('admin.desserts.index') }}" class="text-pink-600 hover:text-pink-800 font-medium">
            <i class="fas fa-arrow-left mr-1"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded relative mb-6">
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.desserts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <!-- <x-cloudinary::widget>Upload Files</x-cloudinary::widget> -->
            <label for="gambar" class="block text-sm font-medium text-gray-700 mb-1">Upload Gambar</label>
            <input type="file" name="gambar" id="gambar" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-pink-50 file:text-pink-700 hover:file:bg-pink-100 border border-gray-300 rounded-md p-1" required>
        </div>

        <div class="mb-5">
            <label for="nama_dessert" class="block text-sm font-medium text-gray-700 mb-1">Nama Dessert</label>
            <input type="text" name="nama_dessert" id="nama_dessert" value="{{ old('nama_dessert') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm border p-2.5" required>
        </div>

        <div class="mb-5">
            <label for="komposisi" class="block text-sm font-medium text-gray-700 mb-1">Komposisi</label>
            <textarea name="komposisi" id="komposisi" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm border p-2.5" required>{{ old('komposisi') }}</textarea>
        </div>

        <div class="mb-5">
            <label for="harga" class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
            <input type="number" name="harga" id="harga" value="{{ old('harga') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm border p-2.5" required>
        </div>

        <div class="mb-6">
            <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
            <input type="text" name="kategori" id="kategori" value="{{ old('kategori') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm border p-2.5" placeholder="Contoh: Puding, Kue, Minuman" required>
        </div>

        <div class="flex justify-end pt-4 border-t border-gray-100">
            <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-2.5 px-6 rounded-md shadow transition-colors">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
