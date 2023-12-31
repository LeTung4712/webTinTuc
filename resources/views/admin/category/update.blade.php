@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể Loại
                            <small>> {{$category->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/category/update/{{$category->id}}" method="POST">
                            {{ csrf_field() }}
                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        <strong>{{$err}}</strong><br/>
                                    @endforeach
                                </div>
                            @endif

                            @if(session('message'))
                                <div class="alert alert-success">
                                    <strong>{{ session('message') }}</strong>
                                </div>
                            @endif
                            <div class="form-group">
                                <p>
                                    <label>Tên hiện tại của Thể Loại</label>
                                    <input class="form-control input-width" name="current_cate" value="{{$category->name}}" disabled="true" />
                                </p>

                                <p>
                                    <label>Thay đổi tên Thể Loại</label>
                                    <input class="form-control input-width" name="cate_changed" placeholder="Nhập tên mới cho Thể Loại" />
                                </p>
                            </div>

                            <div class="form-group">
                                <p><label>Thêm Hình Ảnh</label></p>
                                <p>
                                    <img width="400px" src="upload/category/{{ $category->image }}">
                                </p>
                                <input type="file" class="form-control" name="cate_img_changed">
                            </div>
                            
                            <button type="submit" class="btn btn-default">Thực hiện</button>

                            <button type="reset" class="btn btn-default btn-mleft">Nhập Lại</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection