<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::insert([
            ['id' => 1, 'first_name' => 'admin', 'last_name' => 'master', 'email' => 'admin@gmail.com', 'phone' => '0612345678', 'password' => Hash::make('123456')],
        ]);
    }
}
