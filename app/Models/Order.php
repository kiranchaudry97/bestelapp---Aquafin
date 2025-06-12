<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // ✅ Mass assignment toestaan voor deze velden
    protected $fillable = [
        'user_id',
        'status',
        'leverdatum',
    ];

    // ✅ Relatie met gebruiker
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ✅ Relatie met order items
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}