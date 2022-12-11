<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => "Admin",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => '1',
            'publish' => '1',
        ]);
    }
}
