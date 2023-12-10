<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'role_id' => 1,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123123'),
                'created_at' => '2023-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00',
            ],
        ];
        User::insert($data);
    }
}
