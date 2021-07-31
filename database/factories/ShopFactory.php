<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shop::class;

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
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->streetAddress(),
            'image_url' => $this->faker->imageUrl(),
            'longitude' => $this->faker->longitude(),
            'latitude' => $this->faker->latitude(),
            'email' => $this->faker->email(),
            'siren' => $this->faker->numberBetween(100000, 900000),
            'type_id' => rand(1, 6),
            'user_id' => rand(1, 50),
        ];
    }
}
