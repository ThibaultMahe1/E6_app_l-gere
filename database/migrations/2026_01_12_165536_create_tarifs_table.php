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
        Schema::create('tarifs', function (Blueprint $table) {
            $table->id();
            $table->enum('category', ['cheval', 'poney']);
            $table->string('section'); // enseignement, cartes, a_la_carte, proprietaire
            $table->string('title');
            $table->string('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->string('promo_text')->nullable(); // e.g., "au lieu de 660 €"
            $table->string('frequency')->nullable(); // e.g., "/mois"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarifs');
    }
};
