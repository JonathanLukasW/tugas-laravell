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
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom phone_number dan address
            // Kedua kolom ini diizinkan NULL karena di ProfileController kita menggunakan 'nullable'
            $table->string('phone_number', 15)->nullable()->after('email');
            $table->string('address')->nullable()->after('phone_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop kolom jika kita perlu rollback
            $table->dropColumn(['phone_number', 'address']);
        });
    }
};