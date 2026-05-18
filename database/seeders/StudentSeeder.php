<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'name' => 'Moses',
            'email' => 'crab@gmail.com',
        ]); 
        Student::create([
            'name' => 'Blob',
            'email' => 'blob@gmail.com',
        ]);
    }
}
