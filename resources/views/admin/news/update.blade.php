@extends('admin.layout.index')

@section('content')
<script src="admin_asset/dist/js/extra.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>> {{ $news->title }}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:20px">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    <strong>{{$err}}</strong><br>
                                @endforeach
                            </div>
                        @endif
                        
                        @if(session('error'))
                            <div class="alert alert-danger">
                                <strong>{{session('error')}}</strong>
                            </div>
                        @endif

                        @if(session('message'))
                            <div class="alert alert-success">
                                <strong>{{session('message')}}</strong>
                            </div>
                        @endif
                        <form action="admin/news/update/{{ $news->id }}" method="POST" enctype="multipart/form-data"> <!-- Form bắt buộc phải có thuộc tính enctype thì mới up được file lên -->
                            {{ csrf_field() }}
                            <div class="form-group">
                                <p><label>Chọn Thể Loại</label></p>
                                <select class="form-control input-width catefield" name="cate">
                                    @foreach($category as $chitietTL)
                                        <option
                                        @if($news->newsType->category->id == $chitietTL->id) 
                                            {{ 'selected' }}
                                        @endif
                                         value="{{ $chitietTL->id }}">{{ $chitietTL->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <p><label>Chọn Loại Tin</label></p>
                                <select class="form-control input-width subcatefield" name="sub_cate">
                                    @foreach($newstype as $chitietLT)
                                        <option
                                        @if($news->newsType->id == $chitietLT->id) 
                                            {{ 'selected' }}
                                            {{ 'selected' }}
                                        @endif 
                                         value="{{ $chitietLT->id }}">{{ $chitietLT->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <p><label>Tiêu Đề</label></p>
                                <input class="form-control input-width" name="article_title" value="{{ $news->title }}" />
                            </div>

                            <div class="form-group">
                                <p><label>Thêm Hình Ảnh</label></p>
                                <p>
                                    <img width="400px" src="upload/news/{{ $news->image }}">
                                </p>
                                <input type="file" class="form-control" name="article_img">
                            </div>

                            <div class="form-group">
                                <p><label>Tóm Tắt Nội Dung</label></p>
                                <textarea name="article_desc" id="demo" class="form-control ckeditor" rows="3">
                                    {{ $news->description }}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <p><label>Nội Dung Bài Viết</label></p>
                                <textarea name="article_content" id="demo" class="form-control ckeditor" rows="3">
                                    {{ $news->content }}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <p><label>Tin Tức Nổi Bật?</label></p>
                                <label class="radio-inline">
                                    <input name="article_rep" value="1"
                                    @if($news->trending == 1)
                                        {{ 'checked' }}
                                    @endif
                                     type="radio">Có
                                </label>
                                <label class="radio-inline">
                                    <input name="article_rep" value="0"
                                    @if($news->trending == 0)
                                        {{ 'checked' }}
                                    @endif
                                     type="radio">Không
                                </label>
                            </div>

                            <button type="submit" class="btn btn-default">Thực hiện</button>
                            <button type="reset" class="btn btn-default btn-mleft">Nhập Lại</button>
                        <form>
                    </div>
                    
                </div>
                <!-- /.row -->


                

                <!-- end row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection