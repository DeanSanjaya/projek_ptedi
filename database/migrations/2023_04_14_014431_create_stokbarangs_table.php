<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokbarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('stokbarangs', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('id_kat')->nullable();
        //     $table->integer('id_brng')->nullable();
        //     $table->string('jumlah')->nullable();
        //     $table->string('hargajual')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stokbarangs');
    }
}
