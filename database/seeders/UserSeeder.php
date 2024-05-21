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
            'id' => 'jkjhjjhjhj-jhgjhgjhgj-hjhgj55',
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
            'added_id' => '1',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

    }
}
