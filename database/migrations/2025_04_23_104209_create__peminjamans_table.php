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
        Schema::create('Peminjamans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->integer('jumlah');
            $table->date('tglpinjam');
            $table->date('tglkembali')->nullable();
            $table->string('nama_peminjam');
            $table->string('status')->default('pinjam');
            $table->foreignId('id_barang')->constrained('DataPusats', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Peminjamans');
    }
};
