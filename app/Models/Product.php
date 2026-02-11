<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'slug',
        'price',
        'stock',
        'category_id',
        'description',
        'active'
    ];


    // Conversion automatique des types

    protected $casts = [
        'price' => 'decimal:2',   // "120.00" → 120.00 (nombre)
        'active' => 'boolean',    // 1/0 → true/false
        'stock' => 'integer'      // "10" → 10 (entier)
    ];

    /**
     * Relation N:1 avec Category
     */
    public function category(): BelongsTo // ← Type de retour ajouté - un produit appartient à une seule catégorie
    {
        return $this->belongsTo(Category::class);
    }
    // MON CODE D'AVANT (sans type de retour)
    //    public function category()
    //    {
    //        return $this->belongsTo(Category::class);
    //   }
}
