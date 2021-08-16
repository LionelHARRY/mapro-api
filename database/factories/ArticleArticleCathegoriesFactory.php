<?php

namespace Database\Factories;

use App\Models\ArticleArticleCathegories;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleArticleCathegoriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ArticleArticleCathegories::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article_id' => rand(1, 100),
            'article_cathegory_id' => rand(1, 10)
        ];
    }
}
