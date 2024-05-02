<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gender;
use Faker\Factory as Faker;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $faker = Faker::create();

        $demoGender = Gender::create([
            'gender_id' => 'Gen1',
            'gender'    => 'Male',
            'status'    => 'Active',
            'added_date'    => now(),
        ]);

        $demoGender = Gender::create([
            'gender_id' => 'Gen2',
            'gender'    => 'Female',
            'status'    => 'Active',
            'added_date'    => now(),
        ]);

    }
}
