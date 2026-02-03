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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // Prix : 8 chiffres au total, dont 2 après la virgule (ex: 123456.99)
            $table->decimal('price', 8, 2);
            $table->text('description')->nullable();
            $table->integer('stock')->default(0);

            // Clé étrangère vers la table categories
            // constrained() vérifie automatiquement que l'id existe dans la table 'categories'
            // onDelete('cascade') supprime les produits si la catégorie est supprimée
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
