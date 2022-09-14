<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;

use App\Models\Tip;

class TipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        for ($i = 0; $i < 20; $i++) {
            Tip::create([
                'title' => $faker->words(3, true),
                'content' => '<p>' . $faker->sentences(5, true) . '</p>',
            ]);
        }
    }
}
