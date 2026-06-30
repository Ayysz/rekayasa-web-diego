@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Daftar Menu Dessert</h2>
        <a href="{{ route('desserts.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            Tambah Dessert
        </a>
    </div>

    <div class="overflow-x-auto">
        <table id="dessertTable" class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Gambar</th>
                    <th scope="col" class="px-6 py-3">Nama Dessert</th>
                    <th scope="col" class="px-6 py-3">Komposisi</th>
                    <th scope="col" class="px-6 py-3">Harga</th>
                    <th scope="col" class="px-6 py-3">Kategori</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($desserts as $dessert)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">{{ $dessert->id_dessert }}</td>
                    <td class="px-6 py-4">
                        @if (filter_var($dessert->gambar, FILTER_VALIDATE_URL))
                            <img src="{{ $dessert->gambar }}" alt="{{ $dessert->nama_dessert }}" class="w-16 h-16 object-cover rounded">
                        @else
                            {{ $dessert->gambar }}
                        @endif
                    </td>
                    <td class="px-6 py-4">{{ $dessert->nama_dessert }}</td>
                    <td class="px-6 py-4">{{ $dessert->komposisi }}</td>
                    <td class="px-6 py-4">Rp {{ number_format($dessert->harga, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">{{ $dessert->kategori }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('desserts.edit', $dessert->id_dessert) }}" class="text-white bg-yellow-400 hover:bg-yellow-500 rounded px-3 py-1">Edit</a>
                        <form action="{{ route('desserts.destroy', $dessert->id_dessert) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-red-500 hover:bg-red-600 rounded px-3 py-1">Hapus</button>
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
