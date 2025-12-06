<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Product extends Model
// {
// }



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    // All fillable fields (including the trending ones)
    protected $fillable = [
        'title',
        'description',
        'category',
        'quantity',
        'price',
        'discount_price',
        'image',
        'view_count',          // ← already exists in your DB
        'order_count',         // ← already exists in your DB
        'last_ordered_at',     // ← already exists in your DB
    ];

    // Trending Scope (Algorithm #1)
    public function scopeTrending($query, $limit = 8)
    {
        return $query->orderByRaw(
            '(COALESCE(order_count,0) * 10 + COALESCE(view_count,0)) DESC, last_ordered_at DESC'
        )->limit($limit);
    }
}

