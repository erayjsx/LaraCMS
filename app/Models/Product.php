<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'stock', 'slug', 'category_id'];

    protected $appends = ['main_image_url'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function mainImage()
    {
        return $this->hasOne(Image::class)->where('is_main', true);
    }

    public function getMainImageUrlAttribute()
    {
        return $this->mainImage ? asset($this->mainImage->url) : null;
    }
}
