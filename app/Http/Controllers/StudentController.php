<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Validation\ValidationException;

class StudentController extends Controller
{
    //
    public function index()
    {
        $students = Student::orderBy('created_at', 'asc')->with('course')->get();
        $courses = Course::orderBy('created_at', 'asc')->with('students')->get();
        
        return view('home', compact('students', 'courses'));
    }

    public function store(Request $request){
    
        try{
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

        catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors()
            ], 422);
    }
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

    public function updateStudent(Request $request, $id){

        $request->validate([
            'student_name' => 'required|string|max:255',
            'student_email' => 'required|email|unique:students,email,' . $id
        ]);

        $student = Student::findOrFail($id);

        try{
            $student->update([
                'name' => $request->student_name,
                'email' => $request->student_email
            ]);
        }catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage()
        ], 500);
    }

    return response()->json([
        'success' => true,
        'student' => $student
    ]);
    }


    public function updateCourse(Request $request, $id){

        $request->validate([
            'course_title' => 'required|string|max:255',
            'course_description' => 'required|string'
        ]);

        $course = Course::findOrFail($id);

        try{
            $course->update([
                'title' => $request->course_title,
                'description' => $request->course_description
            ]);
        }catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage()
        ], 500);
    }

    return response()->json([
        'success' => true,
        'course' => $course
    ]);
    }


}
