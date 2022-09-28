<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BarangMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->id('id_barang_masuk');
            $table->foreignId('id_user')->constrained('users', 'id_user')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_barang')->constrained('barang', 'id_barang')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('jumlah_masuk');
            $table->date('tanggal_masuk');
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
        Schema::dropIfExists('barang_masuk');
    }
}
