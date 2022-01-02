<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{Subject,User};
class Time_frame extends Model
{
    public $timestamps = false;

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function student()
    {
        return $this->belongsToMany(student::class, 'classroom_details', 'time_frame_id', 'student_id')->withPivot(["time_in",'time_out','state']);;
    }
}
