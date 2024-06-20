<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductStock>
 */
class ProductStockFactory extends Factory
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
        $store = Store::inRandomOrder()->first();

        return [
            'product_id' => $product->product_id,
            'stock_quantity' => $this->faker->randomNumber(3, true),
            'reorder_level' => '10',
            'store_id' => $store->store_id,
            'user_id' => $user->id,
            'added_id' => $user->id,
            'inventory_date' => $this->faker->dateTimeThisMonth(),
            'added_date' => $this->faker->dateTimeThisMonth(),
            'status' => $this->faker->randomElement(['Active']),
            'archived' => $this->faker->randomElement(['No']),
        ];
    }
}
