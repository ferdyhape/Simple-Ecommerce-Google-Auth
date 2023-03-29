<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart_Detail extends Model
{
    use HasFactory;
    protected $table = 'cart__details';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
