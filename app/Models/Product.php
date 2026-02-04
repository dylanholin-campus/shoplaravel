<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * ✅ $fillable : TOUTES tes colonnes de la table products
     */
    protected $fillable = [
        'name',
        'price',
        'description',
        'stock',
        'image',
        'category_id',
        'active'  // ← On ajoute ce champ boolean
    ];

    /**
     * ✅ $casts : Conversion automatique des types
     */
    protected $casts = [
        'price' => 'decimal:2',   // "120.00" → 120.00 (nombre)
        'active' => 'boolean',    // 1/0 → true/false
        'stock' => 'integer'      // "10" → 10 (entier)
    ];

    /**
     * Relation N:1 avec Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
