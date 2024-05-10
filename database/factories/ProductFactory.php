<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
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
        $user = User::inRandomOrder()->first(); 
        $category = Category::inRandomOrder()->first(); 
        
        return [
            'product_id' => $this->faker->uuid,
            'product_name' => $this->faker->word,
            'category_id' => $category->category_id,
            'stocked' => $this->faker->randomElement(['101', '404']),
            'expirable' => $this->faker->randomElement(['Yes', 'No']),
            'barcode' => $this->faker->randomNumber(5, true),
            'user_id' => $user->id,
            'added_date' => $this->faker->dateTimeThisMonth(),
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
            'archived' => $this->faker->randomElement(['Yes', 'No']),
        ];
    }
}
