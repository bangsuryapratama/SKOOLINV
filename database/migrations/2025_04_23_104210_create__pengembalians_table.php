<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Pengembalians', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->integer('jumlah');
            $table->date('tglkembali');
            $table->string('nama_peminjam');
            $table->string('status')->default('kembali');
            $table->foreignId('id_barang')->constrained('Data_Pusats', 'id')->onDelete('cascade');
            $table->foreignId('id_peminjaman')->constrained('Peminjamans', 'id')->onDelete('cascade');
            $table->foreignId('id_barang_keluar')->constrained('Barang_Keluars', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Pengembalians');
    }
};
