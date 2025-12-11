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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam');
            $table->string('identitas');
            $table->string('kontak');
            $table->unsignedBigInteger('inventaris_id');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');

            $table->foreign('inventaris_id')->references('id')->on('inventaris')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
