<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    // Eğer bir kategori birçok ürüne sahipse (isteğe bağlı)
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
