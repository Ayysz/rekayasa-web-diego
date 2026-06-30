<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dessert extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_dessert';
    
    protected $fillable = [
        'gambar', 
        'nama_dessert', 
        'komposisi', 
        'harga', 
        'kategori'
    ];
}
