<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Facades\DB;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first(); 
        return [
            'category_id' => $this->faker->uuid,
            'category_name' => $this->faker->lastName,
            'user_id' => $user->id,
            // 'added_id' => $user->id,
            'added_date' => $this->faker->dateTimeThisMonth(),
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
            'archived' => $this->faker->randomElement(['Yes', 'No']),
        ];
    }
}
