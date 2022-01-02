@extends('layout.master')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Sinh viên > Sửa thông tin sinh viên</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">

                    <div class="panel-heading">Sửa thông tin sinh viên</div>

                    <!--CONTAIN-MAIN-->
                    <div class="panel-body btn-margins">
                        <div class="row">
                            <div class="col-md-8">
                                <form id="form_add_student"  action="{{ route('student.update',[$student->id]) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group" style="max-width: 38%">
                                        <label class=" control-label">Tên</label>
                                        <input type="text" name="name" class="form-control" value="{{$student->name}}">
                                    </div>
                                    <div class="form-group" style="max-width: 38%">
                                        <label class=" control-label">Mã sinh viên</label>
                                        <input type="text" name="student_code" class="form-control" value="{{$student->student_code}}">
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label">Ảnh sinh viên</label>
                                        <div class="detect-image">
                                            <img id="preview" src="{{asset($student->photo)}}">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-md btn-success">Cập nhật</button>


                                </form>
                            </div>
                            <div class="col-md-4">
                                <div class="detect-image">
                                    <img style="width: 100%;" src="{{ env('SERVER_STREAM') }}">
                                </div>
                                <div style="text-align: center;margin-top:30px;">
                                    <div style="display: inline-block;" id="take_picture_js" class="btn btn-md btn-success">Lấy ảnh</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.panel-->
            </div>
        </div>
    </div>
@endsection

@section('script')
    @parent
    <script>
        $.get("http://localhost:5000/camera_only_read", function(data, status){
            if (data.status != 'success') {
                alert('server chụp ảnh chưa được kích hoạt');
            }

        });
        $('#take_picture_js').click(function () {
            $.get("http://localhost:5000/take_photo", function(data, status){
                if (data.status == 'success') {
                    setTimeout(function () {
                        $('#preview').attr('src','http://localhost:8000/server/photo.jpg?mix='+Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15));
                    }, 500);

                }

            });
        })
    </script>
@endsection
