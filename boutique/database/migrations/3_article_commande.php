<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('article_commande', function (Blueprint $table) {
            $table->id(); // Clé primaire 
            //$table->unsignedBigInteger('commande_id'); // Clé étrangère commandes
            //$table->unsignedBigInteger('article_id');  // Clé étrangère articles
            $table->integer('quantity');
            $table->timestamps();

            // Clés étrangères
            $table->foreignId('commande_id')->constrained()->onDelete('cascade');
            $table->foreignId('article_id')->constrained()->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('article_commande');
    }
};