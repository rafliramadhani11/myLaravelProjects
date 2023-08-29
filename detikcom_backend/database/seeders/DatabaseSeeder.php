<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Buku;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Buku::factory(10)->create();
        Kategori::create([
            'user_id' => 1,
            'nama' => 'Fairy Tale',
            'slug' => 'fairytale'
        ]);
        Kategori::create([
            'user_id' => 2,
            'nama' => 'Comic',
            'slug' => 'comic'
        ]);
        Kategori::create([
            'user_id' => 3,
            'nama' => 'Biography',
            'slug' => 'biography'
        ]);
        User::factory(3)->create();
    }
}
