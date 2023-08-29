<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'Rafli Ramadhani',
            'email' => 'rafliramadhani438@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $user1->assignRole('author');

        $user2 = User::create([
            'name' => 'Oliver Sykes',
            'email' => 'oliver@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $user2->assignRole('super admin');

        $user3 = User::create([
            'name' => 'Tomy Case',
            'email' => 'tomy_case@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $user3->assignRole('admin');
    }
}
