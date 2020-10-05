<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->string("jenis_kelamin")->nullable();
            $table->string("tempat_lahir")->nullable();
            $table->date("tanggal_lahir")->nullable();
            $table->text("alamat")->nullable();
            $table->string("agama")->nullable();
            $table->string("nuptk")->nullable();
            $table->string("no_sk_cpns")->nullable();
            $table->date("tmt_cpns")->nullable();
            $table->date("tmt_pns")->nullable();
            $table->string("pangkat_golongan")->nullable();
            $table->string("kartu_pegawai")->nullable();
            $table->string("karsu")->nullable();
            $table->string("no_hp")->nullable();
            $table->string("jenis_guru")->nullable();
            $table->string("tugas_tambahan")->nullable();
            $table->string("pendidikan")->nullable();
            $table->unsignedInteger('sekolah_id')->nullable();
            $table->unsignedInteger("user_id")->unique();
            $table->timestamps();
            
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("sekolah_id")->references("id")->on("sekolahs");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodatas');
    }
}
