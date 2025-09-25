<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('email');
            $table->date('tgl_masuk')->nullable();
            $table->integer('gaji');
            $table->softDeletes(); // penting untuk soft delete
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
};
