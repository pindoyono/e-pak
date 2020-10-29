<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifikasis', function (Blueprint $table) {
            $table->id();
            $table->text("pesan")->nullable();
            $table->string("status")->nullable();
            $table->unsignedInteger("user_id");
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users");
        });

        Schema::table('berita_acaras', function (Blueprint $table) {
            $table->string('masa_kerja_baru')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verifikasis');
    }
}
