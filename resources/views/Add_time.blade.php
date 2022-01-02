@extends('layout.master')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Giáo viên > Thêm giờ giảng</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">

                    <div class="panel-heading">Thêm Khung giờ</div>

                    <!--CONTAIN-MAIN-->
                    <div class="panel-body btn-margins">
                        <div class="row">
                            <div class="col-md-8">
                                <form id="form_add_student"  action="{{ route('frame_time.store') }}" method="POST" >
                                    @csrf
                                    <label>Kỳ học</label>

                                    <select class="form-control input-lg" name="semester" style="max-width: 38%">
                                        @foreach($semesters as $semester)
                                            <option value="{{$semester->id}}">{{$semester->name}}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <label>Môn học</label>

                                    <select class="form-control input-lg" name="subject" style="max-width: 38%">
                                        @foreach($subjects as $subject)
                                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <label>Giáo viên đảm nhiệm</label>

                                    <select class="form-control input-lg" name="user_id" style="max-width: 38%">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <div class="form-group" style="max-width: 38%">
                                        <label class=" control-label">Ngày bắt đầu</label>
                                        <input type="date" name="date"  class="form-control">
                                    </div>

                                    <div class="form-group" style="max-width: 38%">
                                        <label class=" control-label">Thời gian bắt đầu</label>
                                        <input type="time" name="start_time"  class="form-control">
                                    </div>

                                    <br>
                                    <div class="form-group" style="max-width: 38%">
                                        <label class=" control-label">Thời gian kết thúc</label>
                                        <input type="time" name="end_time"  class="form-control">
                                    </div>

                                    <button type="submit" class="btn btn-md btn-success">Thêm khung giờ</button>


                                </form>
                            </div>

                        </div>
                    </div>
                </div><!-- /.panel-->
            </div>
        </div>
    </div>
@endsection
