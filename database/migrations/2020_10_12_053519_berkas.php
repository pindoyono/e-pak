<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Berkas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('berkas', function (Blueprint $table) {
            
        $table->id();
        $table->string("nama")->nullable();
        $table->string("berkas")->nullable();
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
        Schema::dropIfExists('berkas');
    }
}
