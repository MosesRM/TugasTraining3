<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'id' => Str::uuid(),
            'name' => 'Moses',
            'email' => 'crab@gmail.com',
        ]); 
        Student::create([
            'name' => 'Blob',
            'id' => Str::uuid(),
            'email' => 'blob@gmail.com',
        ]);
    }
}
