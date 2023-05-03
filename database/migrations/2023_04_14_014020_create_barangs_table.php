<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kat')->nullable();
            $table->string('name');
            $table->string('berat_volume')->nullable();
            $table->string('stok')->nullable();
            $table->string('stok_deskripsi')->nullable();
            $table->string('jumlah_besar')->nullable();
            $table->string('jumlah_besar_deskripsi')->nullable();
            $table->string('jumlah_kecil')->nullable();
            $table->string('jumlah_kecil_deskripsi')->nullable();
            $table->string('harga_jual')->nullable();
            // $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('barangs');
    }
}
