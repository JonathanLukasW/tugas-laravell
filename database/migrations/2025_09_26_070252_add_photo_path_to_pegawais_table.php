<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhotoPathToPegawaisTable extends Migration 
{
    public function up(): void
    {
        Schema::table('pegawais', function (Blueprint $table) {
            $table->string('photo_path', 2048)->nullable()->after('gaji');
        });
    }

    public function down(): void
    {
        Schema::table('pegawais', function (Blueprint $table) {
            $table->dropColumn('photo_path');
        });
    }
}