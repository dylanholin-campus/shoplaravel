<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    protected $casts = [];

    public function products(): HasMany // ← Type de retour ajouté - une catégorie a plusieurs produits
    {
        return $this->hasMany(Product::class);
    }

    public function getRouteKeyName(): string // a la place de mon ID j'utilise le slug pour le route model binding
    {
        return 'slug';
    }

    //   public function products()
    //  {
    //      return $this->hasMany(Product::class);
    //  }
}
