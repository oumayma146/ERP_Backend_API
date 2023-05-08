<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "name" => "admin",
                "email" => "admin@admin.com",
                "password" => "123456789",
            ],
            [
                "name" => "Ahmed",
                "email" => "ahmed@gmail.com",
                "password" => "123456789",
            ],
        ];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}
