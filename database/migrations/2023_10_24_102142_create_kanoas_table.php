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
        Schema::create('kanoas', function (Blueprint $table) {
            $table->id();
            $table->string("Email")->unique();
            $table->string("Prenom");
            $table->string("Nom");
            $table->string("Naissance");
            $table->string("password");
            $table->string("password_confirmation");
            $table->integer('nombre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kanoas');
    }
};
