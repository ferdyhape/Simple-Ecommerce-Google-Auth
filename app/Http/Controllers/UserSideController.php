<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserSideController extends Controller
{
    public function index()
    {
        return view('user_side.index', [
            'products' => Product::orderBy('category_id', 'ASC')->get(),
        ]);
    }
}
