<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
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
            'stocked' => $this->faker->randomElement(['101', '404']), // 101 and 404 for stocked item and non-stocked items 
            'expirable' => $this->faker->randomElement(['Yes', 'No']),
            'manufacturer' => $this->faker->randomElement('Tobinco', 'Saqs', 'N and A'),
            'user_id' => $user->id,
            'added_date' => $this->faker->dateTimeThisMonth(),
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
            'archived' => $this->faker->randomElement(['Yes', 'No']),
        ];
    }
}
