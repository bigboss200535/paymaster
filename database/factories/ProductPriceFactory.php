<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductPriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first(); 
        $product = Product::inRandomOrder()->first(); 
        
        return [
            'pp_id' => $this->faker->uuid(),
            'product_id' => $product->product_id,
            'batch_number' => $this->faker->sentence,
            'cost_price' => $this->faker->randomNumber(3, true),
            'distribution_price' => $this->faker->randomNumber(3, true),
            'wholesale_price' => $this->faker->randomNumber(3, true),
            'retail_price' => $this->faker->randomNumber(3, true),
            'user_id' => $user->id,
            'added_id' => $user->id,
            'added_date' => $this->faker->dateTimeThisMonth(),
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
            'archived' => $this->faker->randomElement(['Yes', 'No']),
        ];
    }
}
