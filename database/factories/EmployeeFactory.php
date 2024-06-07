<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first(); 
        // $user_id = DB::table('users')->inRandomOrder()->first();
        $user_id = User::inRandomOrder()->first(); 
        return [
            'employee_id' => $this->faker->uuid,
            'title' => $this->faker->randomElement(['Mr', 'Miss', 'Dr' , 'Mrs']),
            'firstname' => $this->faker->firstName,
            'surname' =>$this->faker->lastName,
            'image' => $this->faker->imageUrl(),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'telephone' => $this->faker->phoneNumber,
            'birthdate' => $this->faker->date,
            'email' => $this->faker->email,
            'ssnit_number' => $this->faker->isbn13(),
            'application_process' => $this->faker->randomElement(['1', '2', '3', '4']),
            'staff_type' => $this->faker->randomElement(['Locum', 'Permanent']),
            'registration_type' => $this->faker->randomElement(['applicant', 'interviewed', 'hired']),
            'verified' => $this->faker->randomElement(['Yes', 'No']),
            'user_id' => $user_id->id,
            'added_id' => $user_id->id,
            'added_date' => $this->faker->dateTimeThisMonth(),
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
            'archived' => $this->faker->randomElement(['Yes', 'No']),
        ];
    }
}
