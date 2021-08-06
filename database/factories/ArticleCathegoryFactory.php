<?php

namespace Database\Factories;

use App\Models\ArticleCathegory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleCathegoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ArticleCathegory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(10),
        ];
    }
}
