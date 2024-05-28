<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $user = User::inRandomOrder()->first(); 

        $data = Store::create([
            'store_id' => '0049',
            'store_name'    => 'Main Store',
            'user_id' => $user->id,
            'status'    => 'Active',
            'added_date'    => now(),
        ]);

        $data = Store::create([
            'store_id' => '0048',
            'store_name'    => 'Sales Store',
            'user_id' => $user->id,
            'status'    => 'Active',
            'added_date'    => now(),
        ]);

    }
}
