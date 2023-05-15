<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produksis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_barang')->nullable();
            $table->integer('id_toko')->nullable();
            $table->integer('row')->nullable();
            $table->string('bahan')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('jumlah_deskripsi')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('produksis');
    }
}
