@extends('admin.layout.index')

@section('content')
<script src="admin_asset/dist/js/extra.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        <h1 class="page-header">Bình Luận
                            <small>> {{ $news->title }}</small>
                        </h1>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th class="text-center">ID</th>
                                <th class="text-center">Tên Người Bình Luận</th>
                                <th class="text-center">Nội Dung</th>
                                <th class="text-center">Ngày Đăng</th>
                                <th class="text-center">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news->comment as $binhluan)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $binhluan->id }}</td>
                                <td>{{ $binhluan->User->name }}</td>
                                <td>{{ $binhluan->content }}</td>
                                <td>{{ dateTimeFormat($binhluan->created_at) }}</td>
                                <td class="center">
                                    <i class="fa fa-trash-o  fa-fw"></i>
                                    <input type="hidden" value="{{$binhluan->id}}">

                                    <a href="#" class="btnDel" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal{{$binhluan->id}}">Xóa</a>
                                        
                                        <div style="text-align: left;" id="myModal{{$binhluan->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Xác Nhận</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Bạn muốn xóa Bình luận có nội dung: "{{$binhluan->content}}"?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-casetype="binhluan" class="btn btn-default btnConf">Có</button>
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
@endsection