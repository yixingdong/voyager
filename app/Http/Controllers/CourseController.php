<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(6);
        return view('coding.courses',compact('courses'));
    }

    public function show(Course $course)
    {
        return view('coding.course',compact('course'));
    }
}
