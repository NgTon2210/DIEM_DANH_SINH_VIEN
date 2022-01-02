<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Time_frame;
class Day_the_week extends Model
{
    public $timestamps = false;

    public function time_frame()
    {
        return $this->hasMany(Time_frame::class)->orderBy('start_time','ASC');
    }
}
