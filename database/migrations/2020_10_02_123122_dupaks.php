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
            $table->id();
            $table->date("awal")->nullable();
            $table->date("akhir")->nullable();
            $table->string("status")->nullable();

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
