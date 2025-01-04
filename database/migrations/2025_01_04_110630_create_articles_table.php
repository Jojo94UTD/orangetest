<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('articles', function (Blueprint $table) {
        $table->id(); // ID unique pour chaque article
        $table->string('title'); // Titre de l'article
        $table->string('author')->nullable(); // Auteur (facultatif)
        $table->text('content'); // Contenu de l'article
        $table->string('source'); // Source (ex : Le Monde)
        $table->string('category')->nullable(); // Catégorie (facultatif)
        $table->timestamp('published_at')->nullable(); // Date de publication
        $table->timestamps(); // Colonnes created_at et updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
