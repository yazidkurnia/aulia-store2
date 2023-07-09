<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'product_id', 'totalqty', 'status', 'order_status'
    ];

    /**
     * Get the user that owns the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // NOTE:: many to many relationship for cart and product
    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_product')->withPivot('quantity');
    }



}
