<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Super Admin',
                'email' => 'saepulramdan244@gmail.com',
                'password' => Hash::make('admin'),
                'no_hp' => '083874731480',
                'level' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
