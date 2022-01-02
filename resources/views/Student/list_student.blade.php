@extends('layout.master')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Sinh viên > Danh sách sinh viên</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">

                    <div style="display: flex;justify-content: space-between;" class="panel-heading"><div>Danh sách sinh viên</div>
                    <div>
                        <a href="{{route('add.student')}}" type="button" class="btn btn-md btn-primary">
                            Thêm Sinh viên</a>
                    </div>
                    </div>

                    <!--CONTAIN-MAIN-->
                    <div class="panel-body btn-margins">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Mã sinh viên</th>
                                        <th>Họ và tên</th>
                                        <th>Ảnh</th>
                                        <th>Xoá</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <td><a href="{{route('student.edit',[$student->id])}}">{{$student -> student_code}}</a></td>
                                            <td>{{$student -> name}}</td>
                                            <td><img style="width: 300px;height: 300px" src="{{asset($student->photo)}}"></td>
                                            <td>
                                                <form action="{{route('student.destroy',[$student->id])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Xoá</button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div><!-- /.panel-->
            </div>
        </div>
    </div>
@endsection

