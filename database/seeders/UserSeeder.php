<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        
        $userdata = User::create([
            // 'id' => 'alha002871',
            'username' => 'mohammed',
            'password'  => '$2y$10$V4.AAnGPPrhLLJsBT28H3.1vF9rpK25BnMr5v420szqNbIWVNq9k6',   //@Mohammed200535
            'firstname' => 'Mohammed',
            'email' => 'bigboss200535@gmail.com',
            'othername' => 'Alhassan',
            'telephone' => '0245340461',
            'gender' => 'Male',
            'mode' => 'New',
            'role' => 'Developer',
            'permission' => 'ontheway',
            'image' => $faker->imageUrl(),
            'added_id' => '',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        // for ($i = 0; $i < 2; $i++){

        //     DB::table('users')->insert([
        //         'id' => $faker->regexify('[A-Z]{5}[0-4]{3}'),
        //         'username' => $faker->userName,
        //         'password' =>  Hash::make('@Mohammed200535'),
        //         'firstname' => $faker->firstName,
        //         'email' => $faker->email,
        //         'othername' => $faker->lastName,
        //         'telephone' => $faker->phoneNumber,
        //         'gender' => $faker->randomElement(['Male', 'Female']),
        //         'mode' => $faker->randomElement(['New', 'Old']),
        //         'role' => $faker->randomElement(['Sales', 'Accounts', 'Accountant', 'HR', 'IT', 'Developer']),
        //         'permission' => $faker->sentence,
        //         'image' => $faker->imageUrl(),
        //         'added_id' => $faker->uuid,
        //         'added_date' => $faker->dateTimeThisMonth(),
        //         'status' => $faker->randomElement(['Active', 'Inactive']),
        //         'archived' => $faker->randomElement(['Yes', 'No']),
        //     ]);
        // }
    }
}
