<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Day_the_week;
class Semester extends Model
{
    public $timestamps = false;

    public function day_the_week()
    {
        return $this->hasMany(Day_the_week::class);
    }
}
