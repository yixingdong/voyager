<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show(Lesson $lesson)
    {
        //dd(json_decode($lesson->video)[0]->download_link);
        return view('coding.lesson',compact('lesson'));
    }
}
