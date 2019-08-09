@extends('backend.master.master')
@section('content')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Danh sách thành viên</li>
            </ol>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách thành viên</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <button class="btn btn-primary " id="create-user" >Thêm Thành viên</button>
                                <table class="table table-bordered" style="margin-top:20px;" id="table">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>ID</th>
                                            <th>Email</th>
                                            <th>Full</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Level</th>
                                            <th width='18%'>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        @foreach($users as $user)
                                        <tr id="tr--{{$user->id}}">
                                            <td id="--{{$user->id}}">{{$user->id}}</td>
                                            <td id="email--{{$user->id}}">{{$user->email}}</td>
                                            <td id="full--{{$user->id}}">{{$user->full}}</td>
                                            <td id="address--{{$user->id}}">{{$user->address}}</td>
                                            <td id="phone--{{$user->id}}">{{$user->phone}}</td>
                                            <td id="level--{{$user->id}}">{{$user->level}}</td>
                                            <td>
                                                <button  data-url="{{ route('users.show',$user->id) }}" class='btn btn-warning edit-user' ><i class='fa fa-pencil'
                                                        aria-hidden='true'></i> Sửa</button>
                                                <button data-url="{{ route('users.show',$user->id) }}" class='btn btn-danger delete-user'><i class='fa fa-trash'
                                                        aria-hidden='true'></i> Xóa</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div align='right'>
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">Trở lại</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">tiếp theo</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
                <!--/.row-->
            </div>
            <!--end main-->
            <!-- add-modal -->
            <div class="modal fade" id="modal-add">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" data-url="{{ route('users.store') }}" id="form-add" method="POST" role="form">

                            <div class="modal-header">
                                <h4 class="modal-title">Add user</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input name="email" type="text" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input name="password" type="password" class="form-control" id="password"
                                        placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="">Fullname</label>
                                    <input name="fullname" type="text" class="form-control" id="fullname"
                                        placeholder="Fullname">
                                </div>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input name="address" type="text" class="form-control" id="address"
                                        placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <label for="">Telephone</label>
                                    <input name="telephone" type="text" class="form-control" id="telephone"
                                        placeholder="Telephone">
                                </div>
                                <div class="form-group">
                                    <label for="">Level</label>
                                    <input name="level" type="text" class="form-control" id="level" placeholder="Level">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end-add-modal -->
            <!-- modal-edit -->
            <div class="modal fade" id="modal-edit">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" data-url="" id="form-edit" method="POST" role="form">

                            <div class="modal-header">
                                <h4 class="modal-title">Edit user</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input name="email" type="text" class="form-control" id="email-edit" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="">Fullname</label>
                                    <input name="fullname" type="text" class="form-control" id="fullname-edit"
                                        placeholder="Fullname">
                                </div>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input name="address" type="text" class="form-control" id="address-edit"
                                        placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <label for="">Telephone</label>
                                    <input name="telephone" type="text" class="form-control" id="telephone-edit"
                                        placeholder="Telephone">
                                </div>
                                <div class="form-group">
                                    <label for="">Level</label>
                                    <input name="level" type="text" class="form-control" id="level-edit" placeholder="Level">
                                </div>
                                <div class="form-group">
                                    <input id="hiden_id" class="hidden" type="text" name="hiden_id">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button  type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end-modal-edit -->
            <!-- modal-delete -->
            <div class="modal fade" id="modal-delete">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" data-url="" id="form-delete" method="POST" role="form">

                            <div class="modal-header">
                                <h4 class="modal-title">Delete user</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Bạn có muốn xóa thành viên: <span id="userdelete"></span></label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                <button  type="submit" class="btn btn-primary">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end-modal-delete -->

            <!-- javascript -->
            <script src="js/jquery-1.11.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
@endsection
@section('ajax_user')
<script src="js/ajax_users.js">    
</script>
@endsection







