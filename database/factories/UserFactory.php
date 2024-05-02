<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'id' => $this->faker->regexify('[A-Z]{5}[0-4]{3}'),
            'username' => $this->faker->userName,
            'firstname' => $this->faker->firstName,
            'othername' => $this->faker->lastName,
            'telephone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail(),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'mode' => $this->faker->randomElement(['New', 'Old']),
            'role' => $this->faker->randomElement(['Sales', 'Accounts', 'Accountant', 'HR', 'IT']),
            'permission' => $this->faker->sentence,
            'added_id' => $this->faker->uuid,
            'added_date' =>$this->faker->dateTimeThisMonth(),
            'password' => '$2y$10$7N6Mcx7xTzQyW6ri4sIt9.nMCxo0JdInkBbI8s3CkaWLj0C6lbFY6', // 12345
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
            'archived' => $this->faker->randomElement(['Yes', 'No']),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    // public function unverified()
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'email_verified_at' => null,
    //         ];
    //     });
    // }
}
