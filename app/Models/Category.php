<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * ✅ $fillable : Colonnes autorisées mass assignment
     */
    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    /**
     * ✅ $casts : Pas de boolean ici (pas de champ 'active')
     */
    protected $casts = [];

    /**
     * Relation 1:N avec Product
     */
    public function products(): HasMany // ← Type de retour ajouté
    {
        return $this->hasMany(Product::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    //   public function products()
    //  {
    //      return $this->hasMany(Product::class);
    //  }
}
