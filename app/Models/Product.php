<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Cart_Detail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function cart_details()
    {
        return $this->hasMany(Cart_Detail::class);
    }
}
