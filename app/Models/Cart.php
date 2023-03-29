<?php

namespace App\Models;

use App\Models\User;
use App\Models\Cart_Detail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function cart_details()
    {
        return $this->hasMany(Cart_Detail::class);
    }
}
