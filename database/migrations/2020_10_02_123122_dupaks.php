<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dupaks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('dupaks', function (Blueprint $table) {
            $table->increments('id');
            $table->date("awal")->nullable();
            $table->date("akhir")->nullable();
            $table->string("status")->nullable();
            $table->string("surat_pengantar")->nullable();
            $table->string("dupak")->nullable();
            $table->string("surat_pernyataan1")->nullable();
            $table->string("surat_pernyataan2")->nullable();
            $table->string("surat_pernyataan3")->nullable();
            $table->string("pembagian_tugas")->nullable();
            $table->string("pak")->nullable();
            $table->string("pkg")->nullable();

            $table->unsignedInteger("user_id");
            
            $table->foreign("user_id")->references("id")->on("users");
            
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
        //
        Schema::dropIfExists('dupaks');
    }
}
