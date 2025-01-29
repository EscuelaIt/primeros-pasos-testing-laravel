<?php

namespace Database\Seeders;

use App\Models\Timetable;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TimetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Timetable::factory()->create([
            'name' => 'Clases curso 2025',
            'description' => 'Clases actualizadas a partir de enero de 2025',
        ]);

        Timetable::factory()->count(5)->create();
    }
}
