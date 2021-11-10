<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->integer('id_pemesanan', true);
            $table->integer('produk_id');
            $table->foreign('produk_id')->references('id_produk')->on('produk');
            $table->integer('pembeli_id');
            $table->foreign('pembeli_id')->references('id_pembeli')->on('pembeli');
            $table->integer('karyawan_id');
            $table->foreign('karyawan_id')->references('id_karyawan')->on('karyawan');
            $table->integer('jumlah');
            $table->string('lama_produksi', 50);
            $table->date('tanggal_pemesanan');
            $table->date('target_selesai');
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
        Schema::dropIfExists('pemesanan');
    }
}
