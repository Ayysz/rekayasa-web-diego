@extends('layouts.admin')

@section('content')
<div class="bg-white shadow rounded-lg p-6 max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Tambah Transaksi Pemesanan</h2>
        <a href="{{ route('admin.transactions.index') }}" class="text-pink-600 hover:text-pink-800 font-medium">
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

    <form action="{{ route('admin.transactions.store') }}" method="POST">
        @csrf
        <div class="mb-5">
            <label for="nama_pelanggan" class="block text-sm font-medium text-gray-700 mb-1">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" id="nama_pelanggan" value="{{ old('nama_pelanggan') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm border p-2.5" required>
        </div>

        <div class="mb-5">
            <label for="id_dessert" class="block text-sm font-medium text-gray-700 mb-1">Dessert</label>
            <select name="id_dessert" id="id_dessert" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm border p-2.5" required>
                <option value="">-- Pilih Dessert --</option>
                @foreach($desserts as $dessert)
                    <option value="{{ $dessert->id_dessert }}" data-harga="{{ $dessert->harga }}" {{ old('id_dessert') == $dessert->id_dessert ? 'selected' : '' }}>
                        {{ $dessert->nama_dessert }} (Rp {{ number_format($dessert->harga, 0, ',', '.') }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" min="1" value="{{ old('jumlah', 1) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm border p-2.5" required>
        </div>

        <div class="mb-5">
            <label for="tanggal_pesanan" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pesanan</label>
            <input type="date" name="tanggal_pesanan" id="tanggal_pesanan" value="{{ old('tanggal_pesanan', date('Y-m-d')) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm border p-2.5" required>
        </div>

        <div class="mb-6">
            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm border p-2.5" required>
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="proses" {{ old('status') == 'proses' ? 'selected' : '' }}>Proses</option>
                <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <div class="flex justify-end pt-4 border-t border-gray-100">
            <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-2.5 px-6 rounded-md shadow transition-colors">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
