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
        Schema::table('perwalian', function (Blueprint $table) {
            $table->unsignedBigInteger('mahasiswa_id'); // Tambahkan kolom mahasiswa_id
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa'); // Definisikan foreign key ke tabel mahasiswas
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perwalian', function (Blueprint $table) {
            $table->dropForeign(['mahasiswa_id']);
            $table->dropColumn('mahasiswa_id');
        });
    }
};
