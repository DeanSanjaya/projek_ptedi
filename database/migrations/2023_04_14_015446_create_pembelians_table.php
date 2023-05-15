<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pemasok')->nullable();
            $table->integer('id_kat')->nullable();
            $table->integer('id_brng')->nullable();
            $table->integer('id_toko')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('deskripsijumlah')->nullable();
            $table->string('berat_volume')->nullable();
            $table->string('desk_b_v')->nullable();
            $table->string('hargabeli')->nullable();
            $table->string('totalbeli')->nullable();
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
        Schema::dropIfExists('pembelians');
    }
}
