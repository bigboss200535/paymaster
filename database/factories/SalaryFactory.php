<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salary>
 */
class SalaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = DB::table('users')->inRandomOrder()->first();
        $employee = DB::table('employee')->inRandomOrder()->first();

        return [
            'employee_id' => $employee->employee_id,
            'basic_salary' => $this->faker->randomNumber(5, true),
            'paye' => $this->faker->randomNumber(5, true),
            'ssnit_a' => $this->faker->randomNumber(3, true),
            'ssnit_b' => $this->faker->randomNumber(3, true),
            'ssnit_c' => $this->faker->randomNumber(5, true),
            'user_id' => $user->id,
            // 'added_id' => $user->id,
            'added_date' => $this->faker->dateTimeThisMonth(),
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
            'archived' => $this->faker->randomElement(['Yes', 'No']),
        ];
    }
}
