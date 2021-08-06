<?php

namespace Database\Factories;

use App\Models\ShopCathegory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopCathegoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShopCathegory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->shopCathegory,
        ];
    }
}
