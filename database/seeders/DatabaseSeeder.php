<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Proyek;
use App\Models\Kegiatan;
use App\Models\Kelompok;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Ridho Alba',
            'email' => 'ridhoalba@gmail.com',
            'password' => bcrypt('12345'),
            'kelompok_id' => 1
        ]);

        User::factory(10)->gmail()->create();
        Kegiatan::factory(100)->create();
        Proyek::factory(100)->create();
        Kelompok::factory(5)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        

        
    }
}
