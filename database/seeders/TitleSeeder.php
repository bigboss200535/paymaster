<?php

namespace Database\Seeders;

use App\Models\Title;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titledata = Title::create([
            'title_id' => 't001',
            'title' => 'Mr',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = Title::create([
            'title_id' => 't002',
            'title' => 'Mrs',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = Title::create([
            'title_id' => 't003',
            'title' => 'Miss',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = Title::create([
            'title_id' => 't004',
            'title' => 'Master',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);
        $titledata = Title::create([
            'title_id' => 't005',
            'title' => 'Dr',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = Title::create([
            'title_id' => 't006',
            'title' => 'Madam',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);
    }
}
