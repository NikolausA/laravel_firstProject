<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.ru',
                'password' => Hash::make('123'),
                'is_admin' => true
            ],
            [
                'name' => 'user1',
                'email' => 'user1@mail.ru',
                'password' => Hash::make('123'),
                'is_admin' => false
            ],
            [
                'name' => 'user2',
                'email' => 'user2@mail.ru',
                'password' => Hash::make('123'),
                'is_admin' => false
            ],
            [
                'name' => 'user3',
                'email' => 'user3@mail.ru',
                'password' => Hash::make('123'),
                'is_admin' => false
            ],
            [
                'name' => 'user4',
                'email' => 'user4@mail.ru',
                'password' => Hash::make('123'),
                'is_admin' => false
            ],
        ];

        DB::table('users')->insert($user);
    }
}
