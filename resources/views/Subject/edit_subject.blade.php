@extends('layout.master')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Môn học> Sửa Môn học</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">

                    <div class="panel-heading">Sửa môn học</div>

                    <!--CONTAIN-MAIN-->
                    <div class="panel-body btn-margins">
                        <div class="row">
                            <div class="col-md-8">
                                <form id="form_add_student"  action="{{ route('subject.update',[$subject->id]) }}" method="POST" >

                                    @csrf
                                    @method('PUT')
                                    <div class="form-group" style="max-width: 38%">
                                        <label class=" control-label">Tên môn học</label>
                                        <input type="text" name="name"  class="form-control" value="{{$subject->name}}" required>
                                    </div>


                                    <button type="submit" class="btn btn-md btn-success">Sửa Môn học</button>


                                </form>
                            </div>

                        </div>
                    </div>
                </div><!-- /.panel-->
            </div>
        </div>
    </div>
@endsection
