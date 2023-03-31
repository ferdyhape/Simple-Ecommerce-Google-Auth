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
            'image' => 'https://iili.io/HO27sfa.th.jpg',
        ]);
        Product::create([
            'name' => 'Nasi Bakar',
            'price' => '12000',
            'stock' => '30',
            'category_id' => 1,
            'description' => $faker->sentence(5),
            'image' => 'https://iili.io/HO2YG1a.th.jpg',
        ]);
        Product::create([
            'name' => 'Nasi Tidak Goreng',
            'price' => '11000',
            'stock' => '23',
            'category_id' => 1,
            'description' => $faker->sentence(5),
            'image' => 'https://iili.io/HO2YX7R.th.jpg',
        ]);
        Product::create([
            'name' => 'Nasi Tidak Bakar',
            'price' => '11000',
            'stock' => '10',
            'category_id' => 1,
            'description' => $faker->sentence(5),
            'image' => 'https://iili.io/HO2YNII.th.jpg',
        ]);
        Product::create([
            'name' => 'Es Teh',
            'price' => '5000',
            'stock' => '87',
            'category_id' => 2,
            'description' => $faker->sentence(5),
            'image' => 'https://iili.io/HO2YeLX.th.jpg',
        ]);
        Product::create([
            'name' => 'Es Teh Anget',
            'price' => '7000',
            'stock' => '22',
            'category_id' => 2,
            'description' => $faker->sentence(5),
            'image' => 'https://iili.io/HO2YSrG.th.jpg',
        ]);
        Product::create([
            'name' => 'Es Bukan Teh',
            'price' => '5000',
            'stock' => '10',
            'category_id' => 2,
            'description' => $faker->sentence(5),
            'image' => 'https://iili.io/HO2YiIS.th.jpg',
        ]);
        Product::create([
            'name' => 'Es Teh Tidak Manis',
            'price' => '5000',
            'stock' => '10',
            'category_id' => 2,
            'description' => $faker->sentence(5),
            'image' => 'https://iili.io/HO2Ysh7.th.jpg',
        ]);
    }
}
