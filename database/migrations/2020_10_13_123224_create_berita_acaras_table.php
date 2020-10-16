<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaAcarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita_acaras', function (Blueprint $table) {
            $table->id();
            $table->string("pendidikan")->nullable();
            $table->string("prajabatan")->nullable();
            $table->string("pembelajaran")->nullable();
            $table->string("bimbingan")->nullable();
            $table->string("tugas_lain")->nullable();
            $table->string("pd")->nullable();
            $table->string("pi")->nullable();
            $table->string("ki")->nullable();
            $table->string("ijazah_tdk_sesuai")->nullable();
            $table->string("pendukung")->nullable();


            $table->unsignedInteger("dupak_id");
            $table->foreign("dupak_id")->references("id")->on("dupaks");    
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
        Schema::dropIfExists('berita_acaras');
    }
}
