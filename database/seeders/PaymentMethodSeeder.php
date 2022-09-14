<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;

use App\Models\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        PaymentMethod::create([
            'name' => 'BCA',
            'type' => 'Virtual Account',
            'status' => 'Active',
            'image' => 'bca.png',
        ]);

        PaymentMethod::create([
            'name' => 'BNI',
            'type' => 'Virtual Account',
            'status' => 'Active',
            'image' => 'bni.png',
        ]);

        PaymentMethod::create([
            'name' => 'Mandiri',
            'type' => 'Virtual Account',
            'status' => 'Active',
            'image' => 'mandiri.png',
        ]);
    }
}
