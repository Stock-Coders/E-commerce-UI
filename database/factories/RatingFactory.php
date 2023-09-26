<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Rating;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $rating       = Rating::find(random_int(1, 15));
        $product_name = $rating->product->title;

        return [
            'rating_level' => fake()->numberBetween(1 , 5),
            // 'customer_id'  => "" ,
            'product_id'   => fake()->numberBetween(1 , 15),
            'product_name' => $product_name,
            'updated_at'   => null,
        ];
    }
}
