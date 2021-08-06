<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(10),
            'description' => $this->faker->text(100),
            'shop_id' => rand(1, 100),
            'article_cathegory_id' => rand(1, 30),
            'price' => rand(1, 100) / 2,
            'image_url' => $this->faker->imageUrl(),
        ];
    }
}
