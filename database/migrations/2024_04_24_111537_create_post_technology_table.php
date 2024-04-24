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
        Schema::create('post_technology', function (Blueprint $table) {
            // aggiungo il campo post_id e gli dico che deve essere una chiave esterna con vincolo
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            //cascadeOnDelete elimina la riga di questa tabella ponte 
            //quando la riga a cui fa riferimento tramite la sua chiave esterna
            //viene cancellata dalla tabella collegata

            //aggiungo allo stesso modo technology_id
            $table->foreignId('technology_id')->constrained()->cascadeOnDelete();

            //chiave primaria deve essere la coppia dei due valori
            $table->primary(['post_id', 'technology_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_technology');
    }
};

           