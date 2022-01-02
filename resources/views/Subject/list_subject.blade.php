@extends('layout.master')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Môn học > Danh sách môn học</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">

                    <div style="display: flex;justify-content: space-between;" class="panel-heading"><div>Danh sách môn học</div>
                        <div>
                            <a href="{{route('subject.create')}}" type="button" class="btn btn-md btn-primary">
                                Thêm môn học</a>
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
                                        <th>Tên môn học</th>
                                        <th>Xoá</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subjects as $key => $subject)
                                        <tr>
                                            <td>{{$key}}</td>
                                            <td><a href="{{route('subject.edit',[$subject->id])}}">{{$subject -> name}}</a></td>

                                            <td>
                                                <form action="{{route('subject.destroy',[$subject->id])}}" method="post">
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

