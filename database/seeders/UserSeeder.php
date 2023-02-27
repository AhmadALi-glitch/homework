<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
   
    public function run(): void
    {
    User::create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password'=>'test12345test',
        ]);
    }
}
