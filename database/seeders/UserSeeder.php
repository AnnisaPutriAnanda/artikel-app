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
        $users = [
            [
               'name'=>'Admin',
               'email'=>'admin@gmail.com',
               'usertype'=>'admin',
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'Super Admin',
               'email'=>'superadmin@gmail.com',
               'usertype'=> 'super_admin',
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'User',
               'email'=>'user@gmail.com',
               'usertype'=>'user',
               'password'=> bcrypt('12345678'),
            ],
        ];
        
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
