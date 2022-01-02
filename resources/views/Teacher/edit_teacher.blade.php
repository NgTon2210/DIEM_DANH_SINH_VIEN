@extends('layout.master')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Giáo viên > Sửa thông tin giáo viên</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">

                    <div class="panel-heading">Sửa thông tin giáo viên</div>

                    <!--CONTAIN-MAIN-->
                    <div class="panel-body btn-margins">
                        <div class="row">
                            <div class="col-md-8">
                                <form id="form_add_student"  action="{{ route('teacher.update',[$teacher->id]) }}" method="POST" >
                                    @method('PUT')
                                    @csrf

                                    <div class="form-group" style="max-width: 38%">
                                        <label class=" control-label">Họ tên giáo viên</label>
                                        <input type="text" name="name"  class="form-control" value="{{$teacher->name}}" required>
                                    </div>

                                    <div class="form-group" style="max-width: 38%">
                                        <label class=" control-label">Email (để đăng nhập)</label>
                                        <input type="email" name="email"  class="form-control" value="{{$teacher->email}}">
                                    </div>

                                    <br>


                                    <button type="submit" class="btn btn-md btn-success">Sửa giáo viên</button>


                                </form>
                            </div>

                        </div>
                    </div>
                </div><!-- /.panel-->
            </div>
        </div>
    </div>
@endsection
