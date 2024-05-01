<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Dosen;
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
            'nim' => 'E32210496',
            'email' => 'ridhoalba@gmail.com',
            'password' => bcrypt('12345'),
            'kelompok_id' => 1
        ]);

        Dosen::factory(10)->gmail()->create();
        User::factory(10)->gmail()->create();
        // Kegiatan::factory(20)->create();
        // Proyek::factory(20)->create();
        // Kelompok::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        

        
    }
}
