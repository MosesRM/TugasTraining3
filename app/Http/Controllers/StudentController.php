<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class StudentController extends Controller
{
    //
    public function index()
    {
        $students = Student::with('course')->get();
        $courses = Course::all();
        
        return view('home', compact('students', 'courses'));
    }

    public function store(Request $request){
    
        $request->validate([
            'student_name' => 'required|string|max:255',
            'student_email' => 'required|email|unique:students,email',
        ]);

        $student = Student::create([
            'name' => $request->student_name,
            'email' => $request->student_email
        ]);

        return response()->json([
            'student' => $student
        ]);
    }

    public function storeCourse(Request $request){
        $request->validate([
            'course_title' => 'required|string|max:255',
            'course_description' => 'required|string',
        ]);

        $course = Course::create([
            'title' => $request->course_title,
            'description' => $request->course_description
        ]);

        return response()->json([
            'course' => $course
        ]);
    }
}
