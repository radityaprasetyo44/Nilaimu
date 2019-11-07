<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaimusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilaimus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('nis');
            $table->integer('K1');
            $table->integer('K2');
            $table->integer('K3');
            $table->integer('K4');
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
        Schema::dropIfExists('nilaimus');
    }
}
