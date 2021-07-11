<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShopCathegory;

class ShopCathegoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShopCathegory::factory()->times(6)->create();
    }
}
