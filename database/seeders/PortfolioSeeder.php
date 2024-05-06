<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Portfolio;
use App\Models\User;

class PortfolioSeeder extends Seeder
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

        $ddata = Portfolio::create([
            'portfolio_id' => 'Pen1',
            'portfolio_name'    => 'Community Nurse',
            'user_id' => $user->id,
            'status'    => 'Active',
            'added_date'    => now(),
        ]);

        $ddata = Portfolio::create([
            'portfolio_id' => 'Pen2',
            'portfolio_name'    => 'Enrolled Nurse',
            'user_id' => $user->id,
            'status'    => 'Active',
            'added_date'    => now(),
        ]);

        $ddata = Portfolio::create([
            'portfolio_id' => 'Pen3',
            'portfolio_name'    => 'HAC Nurse',
            'user_id' => $user->id,
            'status'    => 'Active',
            'added_date'    => now(),
        ]);

        $ddata = Portfolio::create([
            'portfolio_id' => 'Pen4',
            'portfolio_name'    => 'NAC Nurse',
            'user_id' => $user->id,
            'status'    => 'Active',
            'added_date'    => now(),
        ]);

        $ddata = Portfolio::create([
            'portfolio_id' => 'Pen5',
            'portfolio_name'    => 'Midwife',
            'user_id' => $user->id,
            'status'    => 'Active',
            'added_date'    => now(),
        ]);

        $ddata = Portfolio::create([
            'portfolio_id' => 'Pen6',
            'portfolio_name'    => 'Administrator',
            'user_id' => $user->id,
            'status'    => 'Active',
            'added_date'    => now(),
        ]);

        $ddata = Portfolio::create([
            'portfolio_id' => 'Pen7',
            'portfolio_name'    => 'Accounts Officer',
            'user_id' => $user->id,
            'status'    => 'Active',
            'added_date'    => now(),
        ]);

        $ddata = Portfolio::create([
            'portfolio_id' => 'Pen8',
            'portfolio_name'    => 'Accountant',
            'user_id' => $user->id,
            'status'    => 'Active',
            'added_date'    => now(),
        ]);

        $ddata = Portfolio::create([
            'portfolio_id' => 'Pen9',
            'portfolio_name'    => 'Revenue Officer',
            'user_id' => $user->id,
            'status'    => 'Active',
            'added_date'    => now(),
        ]);

        $ddata = Portfolio::create([
            'portfolio_id' => 'Pen10',
            'portfolio_name'    => 'Record Clerk',
            'user_id' => $user->id,
            'status'    => 'Active',
            'added_date'    => now(),
        ]);

        $ddata = Portfolio::create([
            'portfolio_id' => 'Pen11',
            'portfolio_name'    => 'IT Officer',
            'user_id' => $user->id,
            'status'    => 'Active',
            'added_date'    => now(),
        ]);
    }
}
