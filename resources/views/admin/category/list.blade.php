@extends('admin.layout.index')

@section('content')
<script src="admin_asset/dist/js/extra.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể Loại
                            <small>> Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="clearfix"></div>

                    @if(session('message'))
                        <div class="alert alert-success">
                            <strong>{{ session('message') }}</strong>
                        </div>
                    @endif

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th class="text-center">ID</th>
                                <th class="text-center">Tên Thể Loại</th>
                                <th class="text-center">Tên Không Dấu</th>
                                <th class="text-center">Hình ảnh thumbnail</th>
                                <th class="text-center">Sửa</th>
                                <th class="text-center">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $chitiet) 
                                <tr class="odd gradeX" align="center">
                                    <td>{{ $chitiet->id }}</td>
                                    <td>{{ $chitiet->name }}</td>
                                    <td>{{ $chitiet->unsigned_name }}</td>
                                    <td><img src="upload/category/{{ $chitiet->image }}" style="width: 300px; height: 60px; object-fit: cover;"></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/category/update/{{ $chitiet->id }}">Sửa</a></td>
                                    <td class="center">
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        <input type="hidden" class="hiddenID" value="{{ $chitiet->id }}">

                                        <a href="#" class="btnDel" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal{{$chitiet->id}}">Xóa</a>
                                        
                                        <div style="text-align: left;" id="myModal{{$chitiet->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Xác Nhận</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>Thể Loại "{{$chitiet->name}}" hiện đang có tổng cộng {{ count($chitiet->newstype) }} loại tin và {{ count($chitiet->news) }} tin tức thuộc thể loại này.</strong></p>
                                                        <p>Bạn có chắc chắn muốn xóa Thể Loại: "{{$chitiet->name}}" không?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-casetype="category" class="btn btn-default btnConf">Có</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        <!-- Modal -->
        <!-- Modal -->

@endsection