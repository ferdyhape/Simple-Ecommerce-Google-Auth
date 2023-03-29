<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $usercart = DB::table('cart__details')
            ->join('carts', 'cart__details.cart_id', '=', 'carts.id')
            ->join('products', 'cart__details.product_id', '=', 'products.id')
            ->join('users', 'carts.user_id', '=', 'users.id')
            ->where('users.id', '=', auth()->user()->id)
            ->select(
                'users.id',
                'products.name',
                'products.description',
                'products.price',
                'cart__details.qty as qty',
                'cart__details.id as cart_details_id',
            )
            ->orderBy('products.category_id', 'ASC')
            ->get();

        $totalPrice = 0;
        if ($usercart->isEmpty()) {
            $usercart = null;
        } else {
            foreach ($usercart as $cart) {
                $totalPrice += $cart->price * $cart->qty;
            }
        }
        // dd($totalPrice);
        return view('user_side.cart', [
            'usercart' => $usercart,
            'totalPrice' => $totalPrice,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
