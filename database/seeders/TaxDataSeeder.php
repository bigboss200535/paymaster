<?php

namespace Database\Seeders;

use App\Models\TaxData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaxDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $demoData = TaxData::create([
            'tax_id'              => 'A0001',
            'chargeable_income1'  => '319',
            'chargeable_income2'  => '100',
            'chargeable_income3'  => '120',
            'chargeable_income4'  => '3000',
            'chargeable_income5'  => '16461',
            'chargeable_income6'  => '20000',
            'chargeable_income7'  => '0.00',
            'rate1'  => '0',
            'rate2'  => '5',
            'rate3'  => '10',
            'rate4'  => '17.5',
            'rate5'  => '25',
            'rate6'  => '30',
            'rate7'  => '0.00',
            'tax_charged1'  => '0',
            'tax_charged2'  => '5',
            'tax_charged3'  => '12',
            'tax_charged4'  => '525',
            'tax_charged5'  => '4115.25',
            'tax_charged6'  => '0.00', 
            'tax_charged7'  => '0.00', 
            'cummulative_income1'  => '319',
            'cummulative_income2'  => '419',
            'cummulative_income3'  => '539',
            'cummulative_income4'  => '3539.00',
            'cummulative_income5'  => '20000',
            'cummulative_income6'  => '0',
            'cummulative_income7'  => '0.00',
            'effective_date'  => '2023-01-01',
            'expiry_date'  => '2023-12-31',
            'expiry_status'  => 'Yes',
            'added_date'  => '2023-12-31',
        ]);
    }
}
