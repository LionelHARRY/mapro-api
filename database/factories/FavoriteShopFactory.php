<?php

namespace Database\Factories;

use App\Models\FavoriteShop;
use Illuminate\Database\Eloquent\Factories\Factory;

class FavoriteShopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FavoriteShop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(10, 40),
            'shop_id' => rand(70, 100),
        ];
    }
}
