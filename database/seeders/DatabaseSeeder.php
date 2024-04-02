<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('images')->delete();

        $defaultImages = [
            "images/default1.jpg",
            "images/default2.jpg",
            "images/default3.jpg",
            "images/default4.jpg",
            "images/default5.jpg",
            "images/default6.jpg",
            "images/default7.jpg",
            "images/default8.jpg",
            "images/default9.jpg",
            "images/default10.jpg",
        ];

        foreach ($defaultImages as $value){
            DB::table('images')->insert(['image' => $value]);
        }

    }
}
