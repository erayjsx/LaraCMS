<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['code', 'percentage', 'starts_at', 'ends_at'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
