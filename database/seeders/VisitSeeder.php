<?php

namespace Database\Seeders;

use App\Models\Visit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Visit::create([
            'visit_date' => '2023-05-12',
            'visit_time' => '10:00:00',
            'doctor_id' => 2,
            'patient_id' => 3,
            'description' => 'Kontrola',
        ]);

        Visit::create([
            'visit_date' => '2023-05-14',
            'visit_time' => '14:30:00',
            'doctor_id' => 9,
            'patient_id' => 10,
            'description' => 'Sprawdzenie anginy',
        ]);

        Visit::create([
            'visit_date' => '2023-05-18',
            'visit_time' => '11:15:00',
            'doctor_id' => 2,
            'patient_id' => 10,
            'description' => 'Konsultacja wyników',
        ]);
    }
}
