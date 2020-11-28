<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHapaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('hapaks', function (Blueprint $table) {
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
            $table->string("masa_kerja_baru")->nullable();
            $table->string("masa_kerja_lama")->nullable();
            $table->string("penilai")->nullable();
            $table->string("nip_penilai")->nullable();
    
    
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
        //
    }
}
