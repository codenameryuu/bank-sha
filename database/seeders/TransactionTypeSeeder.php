<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;

use App\Models\TransactionType;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        TransactionType::create([
            'name' => 'Top Up',
            'status' => 'Income',
        ]);

        TransactionType::create([
            'name' => 'Transfer',
            'status' => 'Outcome',
        ]);

        TransactionType::create([
            'name' => 'Receive',
            'status' => 'Income',
        ]);

        TransactionType::create([
            'name' => 'Withdraw',
            'status' => 'Outcome',
        ]);

        TransactionType::create([
            'name' => 'Buy Provider Package',
            'status' => 'Outcome',
        ]);

        TransactionType::create([
            'name' => 'Pay Water',
            'status' => 'Outcome',
        ]);

        TransactionType::create([
            'name' => 'Buy Stream Package',
            'status' => 'Outcome',
        ]);

        TransactionType::create([
            'name' => 'Subscribe Movie',
            'status' => 'Outcome',
        ]);

        TransactionType::create([
            'name' => 'Buy Food',
            'status' => 'Outcome',
        ]);

        TransactionType::create([
            'name' => 'Buy Ticket Travel',
            'status' => 'Outcome',
        ]);
    }
}
