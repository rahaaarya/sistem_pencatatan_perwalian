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
            $table->string('nim')->after('id'); // Sesuaikan tipe data dengan tipe data yang sesuai untuk nim
        });
    }

    public function down()
    {
        Schema::table('perwalian', function (Blueprint $table) {
            $table->dropColumn('nim');
        });
    }
};
