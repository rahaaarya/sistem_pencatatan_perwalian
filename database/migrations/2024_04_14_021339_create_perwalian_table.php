<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('perwalian', function (Blueprint $table) {
            $table->id();
            $table->timestamps();


            $table->unsignedBigInteger('id_mahasiswa');
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswa');


            $table->unsignedBigInteger('id_dosen_wali');
            $table->foreign('id_dosen_wali')->references('id')->on('dosen_wali');


            $table->date('tanggal_perwalian')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('perwalian');
    }
};
