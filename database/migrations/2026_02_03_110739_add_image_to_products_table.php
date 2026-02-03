<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Ajoute une colonne 'image' après la description
            // nullable() est important car les anciens produits n'ont pas d'image
            $table->string('image')->nullable()->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Supprime la colonne si on annule la migration
            $table->dropColumn('image');
        });
    }
};
