<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Référence à la table 'users'
            $table->date('date');
            $table->decimal('montant_total', 8, 2);
            $table->timestamps();
        
            // Ajouter une clé étrangère
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
