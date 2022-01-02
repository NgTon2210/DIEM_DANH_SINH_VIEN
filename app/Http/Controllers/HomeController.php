<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\DetectFaceEvent;
use App\{Student,Classroom_detail,Day_the_week};
use Carbon\Carbon;
class HomeController extends Controller
{
    public function index()
    {
        return view('Index');
    }
    function is_inside($time_in, $time_start, $time_end)
    {
        if ( $time_in->gte($time_start) &&  $time_in->lte($time_end) ) {
            return true;
         }
         return false;
    }


    public function handleData(Request $request)
    {
        $student = Student::where('student_code',$request->student_code)->first();
        $now = Carbon::now();
        $day = $now->format('Y-m-d');
        $time_frames = Day_the_week::whereDate('day',$day)->first()->time_frame()->get();
        $state = '';
        $is_time_out = false;
        
        foreach ($time_frames as $time_frame) {
           
            $start = Carbon::parse($time_frame->start_time)->subMinutes(5);
            $threshold = Carbon::parse($time_frame->start_time)->addMinutes(15);
            $time = Carbon::parse($time_frame->start_time)->diffInMinutes(Carbon::parse($time_frame->end_time))/2;
            $minutes = (int)floor($time);
            $time_end = Carbon::parse($time_frame->start_time)->addMinutes($minutes);
            
            if ($this->is_inside($now, $start, Carbon::parse($time_frame->end_time))) {
                $detail = Classroom_detail::where('time_frame_id',$time_frame->id)->where('student_id',$student->id)->first();
                if ($detail) {
                    $is_time_out = true;
                }
               
            }

            //check true_time
            if ( $now->gte($start) &&  $now->lte($threshold) ) {
               $state='true_time';
               break;
            }

            //check late
            if ( $now->gte($threshold ) &&  $now->lte($time_end) ) {
                $state='late_time';
                break;
             }

             //check absent
             if ( $now->gte($time_end ) &&  $now->lte(Carbon::parse($time_frame->end_time)) ) {
                $state='absent_time';
                break;
             }

        }


        $student_code = $request->student_code;
        $name = $student->name;
        $time_in_data = $now->format('Y-m-d H:i:s');
        $time_in = $now->format('H:i');
        $time_out = '__:__';
        if ($is_time_out) {
            $detail -> time_out = $time_in_data;
            $time_in =  Carbon::parse($detail->time_in)->format('H:i');
            $time_out =  $now->format('H:i');
            $state = 'out';
            $detail ->save();
        }else{
            if ($state) {
                $detail = new Classroom_detail;
                $detail -> time_frame_id = $time_frame -> id;
                $detail -> student_id =  $student -> id;
                $detail -> state = $state;
                $detail -> time_in = $time_in_data;
                $detail ->save();
            }
        }
      



        // send data
        $data['student_code'] =  $student_code;
        $data['name'] =  $name;
        $data['photo'] =  $student->photo;
        $data['time_in'] =  $time_in;
        $data['time_out'] = $time_out;
        $data['state'] = $state;

        event(new DetectFaceEvent($data));
        return response('success', 200);
    }

    public function addStudent()
    {
        return view('add_student');
    }
}
