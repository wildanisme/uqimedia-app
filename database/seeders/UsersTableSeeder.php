<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'username' => 'admin',
            'password' => bcrypt('12345'),
            'role_id' => '1'
        ]);

        User::create([
            'name' => 'Kasir Satu',
            'username' => 'kasir',
            'password' => bcrypt('12345'),
            'role_id' => '2'
        ]);
    }
}
