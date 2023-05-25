<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'type_id' => 1,
            'name' => 'Pacjent1',
            'surname' => 'Pacjent1',
            'login' => 'pac2',
            'password' => bcrypt('pac2'),
        ]);

        User::create([
            'type_id' => 1,
            'name' => 'Admin1',
            'surname' => 'Admin1',
            'login' => 'admin',
            'password' => bcrypt('admin'),
        ]);
    }
}
