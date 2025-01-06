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
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Nom de l'utilisateur
        $table->string('email')->unique(); // Email unique
        $table->timestamp('email_verified_at')->nullable(); // Vérification email
        $table->string('password'); // Mot de passe
        $table->rememberToken(); // Token pour le "Remember Me"
        $table->timestamps(); // Créé automatiquement `created_at` et `updated_at`
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
