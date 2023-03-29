<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getProduct()
    {
        $dataProduct =
            DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.name', 'products.name as product_name')
            ->get();

        return response()->json([
            'products' => $dataProduct,
        ]);
    }
    public function index()
    {
        return view('dashboard.product.index', [
            'categories' => Category::all(),
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
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        $newProduct = $request->all();

        $name_image_path = $request->file('image')->store('product-images', 'public');
        $newProduct['image'] = $name_image_path;

        Product::create($newProduct);

        $resizedImage = Image::make(public_path('storage/' . $newProduct['image']))->fit(400, 400)->save();

        return redirect('dashboard/product')->with('toast_success', 'Data successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $updatedProduct = $request->all();

        if ($request->file('image')) {
            if ($request->old_image != "product-images/current-image.png") {
                File::delete('storage/' . $request->old_image);
            }
            $name_image_path = $request->file('image')->store('product-images', 'public');
            $updatedProduct['image'] = $name_image_path;
            $resizedImage = Image::make(public_path('storage/' . $updatedProduct['image']))->fit(400, 400)->save();
        } else {
            $updatedProduct['image'] = $request->old_image;
        }

        unset($updatedProduct['old_image']);
        $product->update($updatedProduct);

        return redirect('/dashboard/product')->with('toast_success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image != "product-images/current-image.png") {
            File::delete('storage/' . $product->image);
        }
        $product->delete();
        return redirect('/dashboard/product')->with('toast_success', 'Data successfully deleted');
    }
}
