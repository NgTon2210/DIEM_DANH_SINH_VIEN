<ul class="nav menu">
    <li class="parent">
        <a href="{{ route('student.index') }}">
            <em class="fa fa-users">&nbsp;</em>
            Quản lý sinh viên
        </a>
        <a href="{{ route('teacher.index') }}">
            <em class="fa fa-user">&nbsp;</em>
            Quản lý giáo viên
        </a>
        <a href="{{ route('subject.index') }}">
            <em class="fa fa-book">&nbsp;</em>
            Quản lý môn học
        </a>
    </li>

    @foreach ($semesters as $semester)

        <li class="parent ">
            <a data-toggle="collapse" href="#sub-item-1" class="" aria-expanded="true">
                <em class="fa fa-th-large">&nbsp;</em> {{ $semester->name }} <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right" aria-expanded="true"><i class="fa fa-plus"></i></span>
            </a>
            <ul class="children list-day collapse in" id="sub-item-1" aria-expanded="true" style="">
                @foreach ($semester->day_the_week as $day_the_weed)
                    <li>
                        <a href="{{ route('admin', ['dayID' => $day_the_weed->id]) }}">{{ $day_the_weed->day_in_week }}</a>
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>