@extends('admin.layout.index')

@section('content')
<script src="admin_asset/dist/js/extra.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>> Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px" >
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
                        <form action="admin/news/add" method="POST" enctype="multipart/form-data"> <!-- Form bắt buộc phải có thuộc tính enctype thì mới up được file lên -->
                            {{ csrf_field() }}
                            
                            <div class="form-group">
                                <p><label>Chọn Thể Loại</label></p>
                                <select class="form-control input-width catefield" name="cate">
                                    @foreach($category as $chitietTL)
                                        <option value="{{ $chitietTL->id }}">{{ $chitietTL->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <p><label>Chọn Loại Tin</label></p>
                                <select class="form-control input-width subcatefield" name="sub_cate">
                                    @foreach($newstype as $chitietLT)
                                        <option value="{{ $chitietLT->id }}">{{ $chitietLT->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <p><label>Tiêu Đề</label></p>
                                <input type="text" class="form-control" style="with:150px" word-wrap="normal" name="article_title" placeholder="Nhập Tiêu Đề Tin Tức" value="{{ old('article_title') }}" />
                            </div>

                            <div class="form-group">
                                <p><label>Tác Giả</label></p>
                                <input type="text" class="form-control input-width" name="article_author" placeholder="Nhập Tác Giả Bài Viết" value="{{ old('article_title') }}" />
                            </div>

                            <div class="form-group">
                                <p><label>Thêm Hình Ảnh Thumbnail</label></p>
                                <input type="file" class="form-control" name="article_img">
                            </div>

                            

                            <div class="form-group" style="width: 170% " >
                                <p><label>Tóm Tắt Nội Dung</label></p>
                                <textarea name="article_desc" id="demo" class="form-control ckeditor" rows="3">
                                    {{ old('article_desc') }} 
                                </textarea>
                            </div>

                            <div class="form-group" style="width: 170%">
                                <p><label>Nội Dung Bài Viết</label></p>
                                <textarea name="article_content" id="demo" class="form-control ckeditor" rows="3">
                                    {{ old('article_content') }}
                                </textarea>
                            </div>

                            

                            <div class="form-group">
                                <p><label>Tin Tức có cho lên trending không? </label></p>
                                <label class="radio-inline">
                                    <input name="article_rep" value="1" checked="" type="radio">Có
                                </label>
                                <label class="radio-inline">
                                    <input name="article_rep" value="0" type="radio">Không
                                </label>
                            </div>

                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default btn-mleft">Nhập Lại</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.catefield').change(function(){
                var id = $(this).val();
                var _token = $('input[name="_token"]').val();
                $.get('admin/ajax/getnewstype/'+id,function(data){
                    console.log(data);
                    $('.subcatefield').html(data);
                });
            });
        });
    </script>
@endsection