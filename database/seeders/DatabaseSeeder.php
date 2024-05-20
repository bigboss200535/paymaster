<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employee;
use App\Models\Salary;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductPrice;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            GenderSeeder::class,
            QuoteSeeder::class,
            TaxDataSeeder::class,
            TitleSeeder::class,
            PortfolioSeeder::class,
        ]);

        User::factory(100)->create();
        Employee::factory(50)->create();
        Salary::factory(50)->create();
        Category::factory(3)->create();
        Product::factory(50)->create();
        ProductPrice::factory(10)->create();
    }
}
