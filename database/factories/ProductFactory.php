<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'title'              => $this->faker->title(),
            'price'              => $this->faker->randomNumber(4 , true) ,
            'description'        => $this->faker->sentence(24),
            'available_quantity' => $this->faker->randomNumber(2 , true),
            'category_id'        => $this->faker->numberBetween(1 , 4),
            'updated_at'         => null,
        ];
    }

}
