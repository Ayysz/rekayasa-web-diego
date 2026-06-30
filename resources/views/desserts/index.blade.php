@extends('layouts.admin')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Data Master Dessert</h2>
        <div class="flex space-x-2">
            <a href="{{ route('admin.desserts.export-pdf') }}" class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded shadow">
                <i class="fas fa-file-pdf mr-2"></i>Export PDF
            </a>
            <a href="{{ route('admin.desserts.create') }}" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded shadow">
                <i class="fas fa-plus mr-2"></i>Tambah Dessert
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table id="dessertTable" class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3 rounded-tl-lg">ID</th>
                    <th scope="col" class="px-6 py-3">Gambar</th>
                    <th scope="col" class="px-6 py-3">Nama Dessert</th>
                    <th scope="col" class="px-6 py-3">Kategori</th>
                    <th scope="col" class="px-6 py-3">Harga</th>
                    <th scope="col" class="px-6 py-3 rounded-tr-lg">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($desserts as $dessert)
                <tr class="bg-white border-b hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">{{ $dessert->id_dessert }}</td>
                    <td class="px-6 py-4">
                        @if (filter_var($dessert->gambar, FILTER_VALIDATE_URL))
                            <img src="{{ $dessert->gambar }}" alt="{{ $dessert->nama_dessert }}" class="w-16 h-16 object-cover rounded shadow-sm">
                        @else
                            <span class="text-xs text-gray-400">No Image</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $dessert->nama_dessert }}</td>
                    <td class="px-6 py-4">
                        <span class="bg-pink-100 text-pink-800 text-xs font-medium px-2.5 py-0.5 rounded">{{ $dessert->kategori }}</span>
                    </td>
                    <td class="px-6 py-4">Rp {{ number_format($dessert->harga, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('admin.desserts.edit', $dessert->id_dessert) }}" class="text-white bg-yellow-500 hover:bg-yellow-600 rounded px-3 py-2 shadow-sm" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.desserts.destroy', $dessert->id_dessert) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-red-500 hover:bg-red-600 rounded px-3 py-2 shadow-sm" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@stack('scripts')
<script>
    $(document).ready(function() {
        $('#dessertTable').DataTable();
    });
</script>
