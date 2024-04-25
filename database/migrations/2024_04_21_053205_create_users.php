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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->unsignedBigInteger('id_role')->index();
            $table->string('nama');
            $table->string('email');
            $table->string('no_hp');
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();

            $table->foreign('id_role')->references('id_role')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
