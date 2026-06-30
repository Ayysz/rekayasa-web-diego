<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->string('nama_pelanggan');
            $table->unsignedBigInteger('id_dessert');
            $table->integer('jumlah');
            $table->decimal('total_harga', 12, 2);
            $table->date('tanggal_pesanan');
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('id_dessert')->references('id_dessert')->on('desserts')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
