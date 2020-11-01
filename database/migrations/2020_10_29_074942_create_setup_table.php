<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setups', function (Blueprint $table) {
            $table->id();
            $table->date("deadline_guru")->nullable();
            $table->date("deadline_verifikator")->nullable();
            $table->date("deadline_penilai")->nullable();
            $table->timestamps();
        });

        Schema::table('verifikasis', function (Blueprint $table) {
            $table->string('link')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setups');
    }
}
