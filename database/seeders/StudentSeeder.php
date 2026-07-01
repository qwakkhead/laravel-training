<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    \App\Models\Student::create([
        'name' => 'Denn Adrian',
        'course' => 'BSCpE',
        'age' => 21,
    ]);

    \App\Models\Student::create([
        'name' => 'Juan Dela Cruz',
        'course' => 'BSIT',
        'age' => 20,
    ]);

    \App\Models\Student::create([
        'name' => 'Maria Santos',
        'course' => 'BSCS',
        'age' => 22,
    ]);
}
}
