<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_code', 'user_id', 'totalqty_item', 'total_price', 'state', 'tax', 'packaging_tax', 'payment_state'
    ];
}
