<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\DB;
// use Faker\Factory as Faker;
use App\Models\Quote;

use Hash;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();

        $demoData = Quote::create([
            'quote_id' => 'q1',
            'quote'  => 'Time is not refundable; use it with intention',
            'added_date' => '2024-04-13'
        ]);

        $demoData = Quote::create([
            'quote_id' => 'q2',
            'quote'  => 'You don’t get paid for the hour, you get paid for the value you bring to the hour.',
            'added_date' => '2024-04-13'
        ]);

        $demoData = Quote::create([
            'quote_id' => 'q3',
            'quote'  => 'The way to get started is to quit talking and begin doing.',
            'added_date' => '2024-04-13'
        ]);

        $demoData = Quote::create([
            'quote_id' => 'q4',
            'quote'  => 'Working on the right thing is probably more important than working hard',
            'added_date' => '2024-04-13'
        ]);
    }
}
