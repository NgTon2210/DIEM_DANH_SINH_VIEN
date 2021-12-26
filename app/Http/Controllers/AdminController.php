<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Day_the_week;
class AdminController extends Controller
{
    public function index(Request $request)
    {
        $dayID = $request->input('dayID');
        $timeFrames='';
        if ($dayID) {
            $timeFrames = Day_the_week::findOrfail($dayID)->time_frame()->get();
        }
        return view('Admin',compact('timeFrames'));
    }
}
