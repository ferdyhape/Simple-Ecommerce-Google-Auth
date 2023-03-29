<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersData = User::all();
        foreach ($usersData as $userData) {
            DB::table('carts')->insert([
                'user_id' => $userData->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
