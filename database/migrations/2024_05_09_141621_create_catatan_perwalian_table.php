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
        Schema::create('catatan_perwalian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perwalian_id');
            $table->foreign('perwalian_id')->references('id')->on('perwalian')->onDelete('cascade');
            $table->text('catatan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('catatan_perwalian');
    }
};
