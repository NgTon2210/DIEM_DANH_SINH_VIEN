<ul class="nav menu">
    <li class="parent"><a href="{{ route('add.student') }}">
       Them 
    </a>

    </li>
    @foreach ($semesters as $semester)
    <li class="parent "><a data-toggle="collapse" href="#sub-item-1" class="" aria-expanded="true">
            <em class="fa fa-file-o">&nbsp;</em> {{ $semester->name }} <span data-toggle="collapse" href="#sub-item-1"
                class="icon pull-right" aria-expanded="true"><i class="fa fa-plus"></i></span>
        </a>
        <ul class="children list-day collapse in" id="sub-item-1" aria-expanded="true" style="">
            @foreach ($semester->day_the_week as $day_the_weed)
                <li><a href="{{ route('admin', ['dayID' => $day_the_weed->id]) }}">Thứ {{ $day_the_weed->day_in_week }}</a></li>
            @endforeach
        </ul>
    </li>
    @endforeach
</ul>
