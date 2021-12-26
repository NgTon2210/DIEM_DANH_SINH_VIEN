<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\DetectFaceEvent;
use App\Student;
class HomeController extends Controller
{
    public function index()
    {
        return view('Index');
    }
    public function handleData(Request $request)
    {
        $data = Student::where('student_code',$request->student_code)->first();
        event(new DetectFaceEvent($data));
        return response('success', 200);
    }

    public function addStudent()
    {
        return view('add_student');
    }
}
