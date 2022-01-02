@extends('layout.master')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Danh mục</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm danh mục</h1>
            <div class="panel panel-default">

                <div class="panel-heading">Bordered Table</div>

                <!--CONTAIN-MAIN-->
                <div class="panel-body btn-margins">
                    <div class="row">
                        <div class="col-md-8">
                            <form id="form_add_student" class="form-horizontal row-border col-md-8" action="{{ route('student.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class=" control-label">Tên</label>                       
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class=" control-label">Mã sinh viên</label>
                                    <input type="text" name="student_code" class="form-control"> 
                                </div>
                                <div class="form-group">
                                    <label class=" control-label">Ảnh sinh viên</label>
                                    <div class="detect-image">
                                        <img id="preview" src="https://picsum.photos/200/300/?blur">
                                    </div>
                                </div>
                               <div class="text-center mt-20 ml-100">
                                    <button type="submit" class="btn btn-md btn-success">Thêm mới</button>
                                    <div id="take_picture_js" class="btn btn-md btn-success">Chup</div>
                               </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <div class="detect-image">
                                <img src="{{ env('SERVER_STREAM') }}">
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
            alert('server detect khong hoat dong');
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