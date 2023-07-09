<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Productdetail;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    /**
     * Get the user associated with the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function productdetail(): HasOne
    {
        return $this->hasOne(Productdetail::class);
    }

    // NOTE:: many to many relationship for product to cart
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_product')->withPivot('quantity');
    }

}
