<?php

namespace App\Http\Controllers;

use App\Day_the_week;
use App\Semester;
use App\Subject;
use App\Time_frame;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
class TimeFrameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semesters = Semester::all();
        $subjects = Subject::all();
        $users = User::where('level',2)->get();
        return view('Add_time',compact('semesters','subjects','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = Day_the_week::where('day',Carbon::parse($request->date)->format("Y-m-d"))->first();

        $weekMap = [
            0 => 'Chủ Nhật',
            1 => 'Thứ 2',
            2 => 'Thứ 3',
            3 => 'Thứ 4',
            4 => 'Thứ 5',
            5 => 'Thứ 6',
            6 => 'Thứ 7',
        ];
        $dayOfTheWeek = Carbon::parse($request->date)->dayOfWeek;
        $weekday = $weekMap[$dayOfTheWeek];

        $dayTheWeek = new Day_the_week();

        if($check){
            $dayTheWeek = $check;
        }
        else{
            $dayTheWeek -> day_in_week = $weekday;
            $dayTheWeek -> day = $request->date;
            $dayTheWeek -> semester_id = $request->semester;
            $dayTheWeek ->save();
        }



        $time_frame = new Time_frame();
        $time_frame -> start_time = $request->date . ' '. $request->start_time;
        $time_frame -> end_time = $request->date . ' '.$request->end_time;
        $time_frame -> subject_id = $request -> subject;
        $time_frame -> day_the_week_id = $dayTheWeek -> id;
        $time_frame -> user_id = $request -> user_id;
        $time_frame ->save();



        return redirect()->route('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
