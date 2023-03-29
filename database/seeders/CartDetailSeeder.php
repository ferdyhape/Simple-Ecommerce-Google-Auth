<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CartDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for ($i = 1; $i <= 20; $i++) {

        //     $randomProduct = Product::inRandomOrder()->first();
        //     $randomCart = Cart::inRandomOrder()->first();
        //     DB::table('cart__details')->insert([
        //         'product_id' => $randomProduct->id,
        //         'cart_id' => $randomCart->id,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ]);
        // }


        DB::table('cart__details')->insert([
            'product_id' => 1,
            'qty' => 3,
            'cart_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('cart__details')->insert([
            'product_id' => 3,
            'qty' => 4,
            'cart_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
