<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRplInggrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpl_inggris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('nis');
            $table->string('nama_kelas');
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
        Schema::dropIfExists('rpl_inggris');
    }
}
