<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;

use App\Models\DataProvider;

class DataProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        DataProvider::create([
            'name' => 'Telkomsel',
            'status' => 'Active',
            'image' => 'telkomsel.png',
        ]);

        DataProvider::create([
            'name' => 'Indosar OOredoo',
            'status' => 'Active',
            'image' => 'indosat.png',
        ]);

        DataProvider::create([
            'name' => 'XL Axiata',
            'status' => 'Active',
            'image' => 'xl.png',
        ]);
    }
}
