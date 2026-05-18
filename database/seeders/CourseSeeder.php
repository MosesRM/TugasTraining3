<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Course::create([
            'title' => 'Matematika', 
            'description' => 'Belajar matematika dasar',
        ]);
        Course::create([
            'title' => 'Bahasa Inggris',
            'description' => 'Belajar bahasa inggris',
        ]);
        Course::create([
            'title' => 'Pemrograman Web',
            'description' => 'Belajar pemrograman web dengan Laravel',
        ]);
    }
}
