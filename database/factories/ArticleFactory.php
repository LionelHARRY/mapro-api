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
            'nom' => $this->faker->text(10),
            'description' => $this->faker->text(100),
            'magasin_id' => rand(1, 100),
            'type_id' => rand(1, 100),
            'prix' => rand(1, 100)/2,
            'image_url' => $this->faker->imageUrl(),
        ];
    }
}
