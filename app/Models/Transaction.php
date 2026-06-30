<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'nama_pelanggan',
        'id_dessert',
        'jumlah',
        'total_harga',
        'tanggal_pesanan',
        'status'
    ];

    public function dessert()
    {
        return $this->belongsTo(Dessert::class, 'id_dessert', 'id_dessert');
    }
}
