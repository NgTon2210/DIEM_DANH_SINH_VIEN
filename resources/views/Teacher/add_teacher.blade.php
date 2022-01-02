@extends('layout.master')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Giáo viên > Thêm giáo viên</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">

                    <div class="panel-heading">Thêm giáo viên</div>

                    <!--CONTAIN-MAIN-->
                    <div class="panel-body btn-margins">
                        <div class="row">
                            <div class="col-md-8">
                                <form id="form_add_student"  action="{{ route('teacher.store') }}" method="POST" >
                                    @csrf

                                    <div class="form-group" style="max-width: 38%">
                                        <label class=" control-label">Họ tên giáo viên</label>
                                        <input type="text" name="name"  class="form-control" required>
                                    </div>

                                    <div class="form-group" style="max-width: 38%">
                                        <label class=" control-label">Email (để đăng nhập)</label>
                                        <input type="email" name="email"  class="form-control">
                                    </div>

                                    <br>
                                    <div class="form-group" style="max-width: 38%">
                                        <label class=" control-label">Mật khẩu</label>
                                        <input type="password" name="password"  class="form-control">
                                    </div>

                                    <button type="submit" class="btn btn-md btn-success">Thêm giáo viên</button>


                                </form>
                            </div>

                        </div>
                    </div>
                </div><!-- /.panel-->
            </div>
        </div>
    </div>
@endsection
