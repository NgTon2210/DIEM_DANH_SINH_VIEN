<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Semester;
class MenuComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $data['semesters'] = Semester::with('day_the_week')->get(); 
        return view('components.menu-component',$data);
    }
}
