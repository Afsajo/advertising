<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('users')->insert([
         'name' => 'Admin',
         'email' => 'admin@example.com',
         'password' => Hash::make('password'),
         'username' => 'admin',
         'alamat' => 'Jln. Perjuangan No 1234',
         'telp' => '081312344321',
         'level' => 'admin',
         ]);
         DB::table('users')->insert([
         'name' => 'Member',
         'email' => 'member@example.com',
         'password' => Hash::make('password'),
         'username' => 'member',
         'alamat' => 'Jln. Nasution Blok H No 31',
         'telp' => '081761344310',
         'level' => 'member',
         ]);
    }
}
