@extends('layout.master')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Khung giờ</li>
        </ol>
    </div>
@if ($timeFrames)
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản lí sinh viên</h1>
                <div class="text-right">
                    <a href="{{ route('frame_time.create') }}" type="button" class="btn btn-md btn-primary">
                        <span class="fa fa-calendar"></span>
                        Thêm khung giờ</a>


                </div>
                <ul class="nav nav-pills mb-3 time-active" id="pills-tab" role="tablist">
                    @foreach ($timeFrames as $timeFrame)
                    <li class="nav-item " role="presentation">
                        <a class="nav-link active" id="pills-home-tab{{ $timeFrame -> id }}" data-toggle="pill" href="#pills-home{{ $timeFrame->id }}" role="tab"
                            aria-controls="pills-home{{ $timeFrame->id }}" aria-selected="true">
                            <div class="range-time">
                                <h4 class="text-center range-houre range-time-mb-0"><span>{{Carbon\Carbon::parse($timeFrame->start_time)->format('H:i')}}</span>-<span>{{Carbon\Carbon::parse($timeFrame->end_time)->format('H:i')}}</span>
                                </h4>
                                <p class="text-center subject range-time-mb-0">{{  $timeFrame->subject->name  }}</p>
                                <p class="text-center teacher range-time-mb-0">{{  $timeFrame->user->name  }}</p>
                            </div>
                        </a>
                    </li>
                    @endforeach
                   
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    @foreach ($timeFrames as $timeFrame)
                        <div class="tab-pane fade" id="pills-home{{ $timeFrame->id }}" role="tabpanel" aria-labelledby="pills-home-tab{{ $timeFrame -> id }}">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Stt</th>
                                        <th>Họ tên</th>
                                        <th>Giờ vào</th>
                                        <th>Giờ ra</th>
                                        <th>Đi muộn</th>
                                        <th>Vắng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($timeFrame->student as $student)
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->pivot->time_in }}</td>
                                        <td>{{ $student->pivot->time_out }}</td>
                                        <td>{{ $student->pivot->state == 'late_time'?'M':'' }}</td>
                                        <td>{{ $student->pivot->state == 'absent_time'?'V':'' }}</td>
                                    </tr>
                                  @endforeach
        
        
                                </tbody>
                            </table>
                        </div>
                    @endforeach
              
                </div>
            </div>
        </div>
@endif
</div>
@endsection
