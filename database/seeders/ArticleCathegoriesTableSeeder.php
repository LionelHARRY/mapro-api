<?php

namespace Database\Seeders;

use App\Models\ArticleCathegory;
use Illuminate\Database\Seeder;

class ArticleCathegoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleCathegory::factory()->times(30)->create();
    }
}
