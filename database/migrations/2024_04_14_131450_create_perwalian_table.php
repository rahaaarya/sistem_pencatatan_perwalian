<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('perwalian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa');
            $table->foreignId('nama_mahasiswa')->constrained('mahasiswa');
            $table->foreignId('program_studi_id')->constrained('program_studi');
            $table->foreignId('dosen_id')->constrained('dosen');
            $table->foreignId('tahun_akademik_id')->constrained('tahun_akademik');
            $table->date('tanggal_perwalian');
            $table->timestamps();
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
