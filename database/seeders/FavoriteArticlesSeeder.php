<?php

namespace Database\Seeders;

use App\Models\FavoriteArticle;
use Illuminate\Database\Seeder;

class FavoriteArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FavoriteArticle::factory()->times(15)->create();
    }
}
