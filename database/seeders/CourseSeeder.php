<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Course::create([
            'id' => Str::uuid(),
            'title' => 'Matematika', 
            'description' => 'Belajar matematika dasar',
        ]);
        Course::create([
            'id' => Str::uuid(),
            'title' => 'Bahasa Inggris',
            'description' => 'Belajar bahasa inggris',
        ]);
        Course::create([
            'id' => Str::uuid(),
            'title' => 'Pemrograman Web',
            'description' => 'Belajar pemrograman web dengan Laravel',
        ]);
    }
}
