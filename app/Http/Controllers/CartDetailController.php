<?php

namespace App\Http\Controllers;

use App\Models\Cart_Detail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use function PHPUnit\Framework\isNull;
use App\Http\Requests\StoreCart_DetailRequest;
use App\Http\Requests\UpdateCart_DetailRequest;

class CartDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreCart_DetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCart_DetailRequest $request)
    {
        // dd($request);
        $newCart = $request->all();
        // dd($newCart);

        $newCart['cart_id'] = auth()->user()->carts->id;
        // dd($newCart);

        $productAdd = Cart_Detail::where('product_id', $newCart['product_id'])->where('cart_id', $newCart['cart_id'])->first();
        // dd($productAdd);

        if (is_null($productAdd)) {
            // dd("masukk if");
            Cart_Detail::create($newCart);
        } else {
            // dd("masukk else");
            // dd($productAdd);
            $productAdd['qty'] += $newCart['qty'];
            $productAdd->save();
        }

        return redirect('/cart')->with('toast_success', 'Product successfully add to cart!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart_Detail  $cart_Detail
     * @return \Illuminate\Http\Response
     */
    public function show(Cart_Detail $cart_Detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart_Detail  $cart_Detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart_Detail $cart_Detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCart_DetailRequest  $request
     * @param  \App\Models\Cart_Detail  $cart_Detail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCart_DetailRequest $request, Cart_Detail $cart_Detail)
    {
        $editedCart = $request->all();
        // dd($cart_Detail);

        $findCart = Cart_Detail::find($editedCart['id']);
        // dd($findCart);
        $findCart->update($editedCart);

        return redirect('/cart')->with('toast_success', 'product successfully updated on cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart_Detail  $cart_Detail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart_delete = Cart_Detail::find($id);
        $cart_delete->delete();
        return redirect('/cart')->with('toast_success', 'Product successfully deleted from cart!');
    }
}
