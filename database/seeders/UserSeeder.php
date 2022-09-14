<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;

use App\Models\User;
use App\Models\Wallet;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        $user = User::create([
            'name' => 'Fikri Sabriansyah',
            'username' => 'fikrisabriansyah',
            'password' => Hash::make('fikrisabriansyah'),
            'pin' => '720720',
            'email' => 'fikrisabriansyah@gmail.com',
            'status' => 'Verified',
            'image' => 'fikrisabriansyah.jbg',
            'identity_card_image' => 'fikrisabriansyah.jbg',
        ]);

        Wallet::create([
            'user_id' => $user->id,
            'card_number' => '123456789',
            'balance' => '100000',
        ]);
    }
}
