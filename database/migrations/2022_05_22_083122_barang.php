<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Barang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_barang');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->foreignId('id_jenis')->constrained('jenis', 'id_jenis')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_satuan')->constrained('satuan', 'id_satuan')->onUpdate('cascade')->onDelete('cascade');
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
