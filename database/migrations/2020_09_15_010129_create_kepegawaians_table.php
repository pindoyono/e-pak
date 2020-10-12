<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKepegawaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepegawaians', function (Blueprint $table) {
            $table->id();
            $table->string('sk_cpns')->nullable();
            $table->string('sk_pangkat')->nullable();
            $table->string('sk_jafung')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('karpeg')->nullable();
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
        Schema::dropIfExists('kepegawaians');
    }
}
