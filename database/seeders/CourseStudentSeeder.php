<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Course;

class CourseStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Manual karena cuma contoh data biar tampil
        $student1 = Student::where('name', 'Moses', )->firstOrFail();
        $course1 = Course::where('title', 'Matematika')->firstOrFail();
        $course2 = Course::where('title', 'Pemrograman Web')->firstOrFail();
        $student2 = Student::where('name', 'Blob')->firstOrFail();
        $course3 = Course::where('title', 'Bahasa Inggris')->firstOrFail();

        $student1->course()->attach([
            $course1->id => ['status' => 'active'],
            $course2->id => ['status' => 'completed']
        ]);
        $student2->course()->attach([
            $course3->id => ['status' => 'active']
        ]);

    }
}
