<?php

namespace Database\Seeders;

use App\Models\FavoriteShop;
use Illuminate\Database\Seeder;

class FavoriteShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FavoriteShop::factory()->times(20)->create();
    }
}
