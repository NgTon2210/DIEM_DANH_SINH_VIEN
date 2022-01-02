@extends('layout.master')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Giáo viên > Danh sách giáo viên</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">

                    <div style="display: flex;justify-content: space-between;" class="panel-heading"><div>Danh sách giáo viên</div>
                        <div>
                            <a href="{{route('teacher.create')}}" type="button" class="btn btn-md btn-primary">
                                Thêm giáo viên</a>
                        </div>
                    </div>

                    <!--CONTAIN-MAIN-->
                    <div class="panel-body btn-margins">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ và tên</th>
                                        <th>Email</th>
                                        <th>Xoá</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($teachers as $key => $teacher)
                                        <tr>
                                            <td>{{$key}}</td>
                                            <td><a href="{{route('teacher.edit',[$teacher->id])}}">{{$teacher -> name}}</a></td>
                                            <td>{{$teacher->email}}</td>

                                            <td>
                                                <form action="{{route('teacher.destroy',[$teacher->id])}}" method="post">
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

