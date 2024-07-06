<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_paket');
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_metode_pembayaran');
            $table->dateTime('dibayar_pada');
            $table->enum('payment_status', ['BERHASIL', 'MENUNGGU', 'GAGAL']);
            $table->timestamps();

            $table->foreign('id_paket')->references('id')->on('paket');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan');
            $table->foreign('id_metode_pembayaran')->references('id')->on('metode_pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('transaksi');
    }
};
