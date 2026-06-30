@extends('layouts.admin')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Data Transaksi Pemesanan</h2>
        <a href="{{ route('admin.transactions.create') }}" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded shadow">
            <i class="fas fa-plus mr-2"></i>Tambah Transaksi
        </a>
    </div>

    <div class="overflow-x-auto">
        <table id="transactionTable" class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3 rounded-tl-lg">ID</th>
                    <th scope="col" class="px-6 py-3">Nama Pelanggan</th>
                    <th scope="col" class="px-6 py-3">Dessert</th>
                    <th scope="col" class="px-6 py-3">Jumlah</th>
                    <th scope="col" class="px-6 py-3">Total Harga</th>
                    <th scope="col" class="px-6 py-3">Tanggal</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3 rounded-tr-lg">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr class="bg-white border-b hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">{{ $transaction->id_transaksi }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $transaction->nama_pelanggan }}</td>
                    <td class="px-6 py-4">{{ $transaction->dessert->nama_dessert ?? 'N/A' }}</td>
                    <td class="px-6 py-4">{{ $transaction->jumlah }}</td>
                    <td class="px-6 py-4">Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">{{ $transaction->tanggal_pesanan }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $transaction->status == 'selesai' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ ucfirst($transaction->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('admin.transactions.edit', $transaction->id_transaksi) }}" class="text-white bg-yellow-500 hover:bg-yellow-600 rounded px-3 py-2 shadow-sm" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.transactions.destroy', $transaction->id_transaksi) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?');">
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

    <div class="mt-6">
        {{ $transactions->links() }}
    </div>
</div>
@endsection

@stack('scripts')
<script>
    $(document).ready(function() {
        $('#transactionTable').DataTable({
            paging: false,
            info: false
        });
    });
</script>
