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
        Schema::create('evenement', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('image');
            $table->string('heuresDebut');
            $table->string('minutesDebut');
            $table->string('heuresFin');
            $table->string('minutesFin');
            $table->string('jourDebut');
            $table->string('moisDebut');
            $table->string('jourFin');
            $table->string('moisFin');
            $table->string('prix');
            $table->string('Devise');
            $table->string('lieu');
            // Ajoutez d'autres colonnes selon vos besoins
            $table->timestamps();
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
