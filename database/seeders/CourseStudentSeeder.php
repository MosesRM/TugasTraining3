<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class CourseStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pake 2 data dulu 
        $student1 = Student::findOrFail(1);
        $student2 = Student::findOrFail(2);

        $student1->course()->attach([
            1 => ['status' => 'active'], 
            2 => ['status' => 'completed']
        ]);
        $student2->course()->attach([
            2 => ['status' => 'completed']
        ]);

    }
}
