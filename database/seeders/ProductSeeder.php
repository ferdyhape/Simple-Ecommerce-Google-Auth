<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        Product::create([
            'name' => 'Nasi Goreng',
            'price' => '10000',
            'stock' => '20',
            'category_id' => 1,
            'description' => $faker->sentence(5),
            'image' => 'seeder-image/product-images/nasigoreng.jpg',
        ]);
        Product::create([
            'name' => 'Nasi Bakar',
            'price' => '12000',
            'stock' => '30',
            'category_id' => 1,
            'description' => $faker->sentence(5),
            'image' => 'seeder-image/product-images/nasibakar.jpg',
        ]);
        Product::create([
            'name' => 'Nasi Tidak Goreng',
            'price' => '11000',
            'stock' => '23',
            'category_id' => 1,
            'description' => $faker->sentence(5),
            'image' => 'seeder-image/product-images/nasitidakgoreng.jpg',
        ]);
        Product::create([
            'name' => 'Nasi Tidak Bakar',
            'price' => '11000',
            'stock' => '10',
            'category_id' => 1,
            'description' => $faker->sentence(5),
            'image' => 'seeder-image/product-images/nasitidakbakar.jpg',
        ]);
        Product::create([
            'name' => 'Es Teh',
            'price' => '5000',
            'stock' => '87',
            'category_id' => 2,
            'description' => $faker->sentence(5),
            'image' => 'seeder-image/product-images/esteh.jpg',
        ]);
        Product::create([
            'name' => 'Es Teh Anget',
            'price' => '7000',
            'stock' => '22',
            'category_id' => 2,
            'description' => $faker->sentence(5),
            'image' => 'seeder-image/product-images/estehanget.jpg',
        ]);
        Product::create([
            'name' => 'Es Bukan Teh',
            'price' => '5000',
            'stock' => '10',
            'category_id' => 2,
            'description' => $faker->sentence(5),
            'image' => 'seeder-image/product-images/esbukanteh.jpg',
        ]);
        Product::create([
            'name' => 'Es Teh Tidak Manis',
            'price' => '5000',
            'stock' => '10',
            'category_id' => 2,
            'description' => $faker->sentence(5),
            'image' => 'seeder-image/product-images/estehtidakmanis.jpg',
        ]);
    }
}
