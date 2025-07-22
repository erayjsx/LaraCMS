<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    protected $fillable = ['name', 'email', 'customer_group_id'];

    public function group(): BelongsTo
    {
        return $this->belongsTo(CustomerGroup::class, 'customer_group_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function abandonedOrders()
    {
        return $this->hasMany(AbandonedOrder::class);
    }
}
