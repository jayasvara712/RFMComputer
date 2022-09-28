<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BarangKeluar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id('id_barang_keluar');
            $table->foreignId('id_user')->constrained('users', 'id_user')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_barang')->constrained('barang', 'id_barang')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('jumlah_keluar');
            $table->date('tanggal_keluar');
            $table->timestamps();
            $table->index(['id_user', 'id_barang']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_keluar');
    }
}
