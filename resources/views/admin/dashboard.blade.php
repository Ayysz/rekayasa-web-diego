@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
    <p class="text-gray-600 mt-2">Selamat datang di Panel Admin Diego Dessert.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Stat 1 -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between hover:shadow-md transition-shadow">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Total Data Master Dessert</p>
            <h3 class="text-3xl font-bold text-gray-800">{{ $totalDesserts }}</h3>
        </div>
        <div class="w-14 h-14 rounded-full bg-pink-100 flex items-center justify-center text-pink-600">
            <i class="fas fa-ice-cream text-2xl"></i>
        </div>
    </div>

    <!-- Stat 2 -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between hover:shadow-md transition-shadow">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Total Transaksi Pemesanan</p>
            <h3 class="text-3xl font-bold text-gray-800">{{ $totalTransactions }}</h3>
        </div>
        <div class="w-14 h-14 rounded-full bg-pink-100 flex items-center justify-center text-pink-600">
            <i class="fas fa-shopping-cart text-2xl"></i>
        </div>
    </div>

    <!-- Stat 3 -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between hover:shadow-md transition-shadow">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Total User Admin</p>
            <h3 class="text-3xl font-bold text-gray-800">{{ $totalUsers }}</h3>
        </div>
        <div class="w-14 h-14 rounded-full bg-pink-100 flex items-center justify-center text-pink-600">
            <i class="fas fa-users text-2xl"></i>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 text-center">
    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-pink-50 mb-4">
        <i class="fas fa-leaf text-4xl text-pink-500"></i>
    </div>
    <h2 class="text-2xl font-bold text-gray-800 mb-2">Diego Dessert</h2>
    <p class="text-gray-600 max-w-lg mx-auto">Silakan gunakan menu navigasi di sebelah kiri untuk mengelola master data produk, memantau transaksi, serta mengatur akses pengguna (user).</p>
</div>
@endsection
