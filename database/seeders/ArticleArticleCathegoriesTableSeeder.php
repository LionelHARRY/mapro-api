<?php

namespace Database\Seeders;

use App\Models\ArticleArticleCathegories;
use Illuminate\Database\Seeder;

class ArticleArticleCathegoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleArticleCathegories::factory()->times(50)->create();
    }
}
