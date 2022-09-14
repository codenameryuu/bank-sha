<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;

use App\Models\DataProviderPackage;


class DataProviderPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        for ($i = 1; $i <= 3; $i++) {
            DataProviderPackage::create([
                'data_provider_id' => $i,
                'name' => rand(1, 5) . 'GB',
                'price' => rand(10000, 50000),
            ]);
        }

        for ($i = 1; $i <= 3; $i++) {
            DataProviderPackage::create([
                'data_provider_id' => $i,
                'name' => rand(6, 10) . 'GB',
                'price' => rand(60000, 100000),
            ]);
        }

        for ($i = 1; $i <= 3; $i++) {
            DataProviderPackage::create([
                'data_provider_id' => $i,
                'name' => rand(11, 15) . 'GB',
                'price' => rand(110000, 150000),
            ]);
        }

        for ($i = 1; $i <= 3; $i++) {
            DataProviderPackage::create([
                'data_provider_id' => $i,
                'name' => rand(15, 20) . 'GB',
                'price' => rand(160000, 200000),
            ]);
        }
    }
}
