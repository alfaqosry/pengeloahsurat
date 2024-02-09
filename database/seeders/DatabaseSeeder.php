<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Alamat;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'email' => 'admin@admin.com',
            'role' => '0',
            'password' => bcrypt('12345'),
            'flag' => 0

        ]);
        User::create([
            'id' => 2,
            'email' => 'user1@admin.com',
            'role' => '1',
            'password' => bcrypt('12345'),
            'flag' => 0

        ]);


        User::create([
            'id' => 3,
            'email' => 'user2@admin.com',
            'role' => '2',
            'password' => bcrypt('12345'),
            'flag' => 0

        ]);

        User::create([
            'id' => 4,
            'email' => 'user3@admin.com',
            'role' => '3',
            'password' => bcrypt('12345'),
            'flag' => 0

        ]);
    }
}
