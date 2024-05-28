<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('perwalian', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('nama_mahasiswa');
            $table->string('program_studi');
            $table->unsignedBigInteger('dosen_id');
            $table->unsignedBigInteger('tahun_akademik_id');
            $table->date('tanggal_perwalian');
            $table->timestamps();

            $table->foreign('nim')->references('nim')->on('mahasiswa');
            $table->foreign('dosen_id')->references('id')->on('dosen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perwalian');
    }
};
