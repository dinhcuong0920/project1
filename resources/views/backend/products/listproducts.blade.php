@extends('backend.master.master')
@section('content')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Danh sách sản phẩm</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách sản phẩm</h1>
            </div>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <button href="" class="btn btn-primary"  id="btn-add-product">Thêm sản phẩm</button>
                                <input class="form-control mr-sm-2" id="search-product" width="40%" type="search"
                                    placeholder="Search" style="margin-top: 10px;width: 30%;">
                                <span id="form_result"></span>
                                <div class="render_page">
                                    <table id="products_table" class="table table-bordered" style="margin-top:10px;">
                                        <thead>
                                            <tr class="bg-primary">
                                                <th>ID</th>
                                                <th>Thông tin sản phẩm</th>
                                                <th>Giá sản phẩm</th>
                                                <th>Miêu tả</th>
                                                <th>Danh mục</th>
                                                <th>Tùy chọn</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_product">
                                            @foreach($products as $product)
                                            <tr id="tr--{{$product->id}}">
                                                <td>{{$product->id}}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-3"><img src="/admins/img/{{$product->img}}" alt="Áo đẹp" width="100px" class="thumbnail"></div>
                                                        <div class="col-md-9">
                                                            <p><strong>Mã sản phẩm : {{$product->code}}</strong></p>
                                                            <p>Tên sản phẩm :{{$product->name}}</p>
                                                            <p>Danh mục:{{$product->category->name}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{$product->price}}VND</td>
                                                <td>
                                                    <p>{{$product->describe}}</p>
                                                </td>
                                                <td>{{$product->category->name}}</td>
                                                <td>
                                                    <button data-url="{{ route('products.show',$product->id) }}" class="btn btn-warning btn_edit_product"><i class="fa fa-pencil"
                                                            aria-hidden="true"></i> Sửa</button>
                                                    <button data-url="{{ route('products.show',$product->id) }}" href="#" class="btn btn-danger btn_delete_product"><i class="fa fa-trash"
                                                            aria-hidden="true"></i> Xóa</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div align='right'>
                                        <ul class="pagination">
                                            {{ $products->links() }}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
                <!--/.row-->
            </div>
            <!-- add-modal-product -->
            <div class="modal fade" id="modal-add-product" data-url="{{ route('products.update','1') }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form data-url="{{ route('products.store') }}" enctype="multipart/form-data" id="form-add-product" method="POST" role="form">
                            @csrf
                            <div class="modal-header">
                                <h4 class="modal-title"></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <span id="alert_error"></span>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Tên sản phẩm</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="">Mã sản phẩm</label>
                                    <input name="code" type="text" class="form-control" id="code" placeholder="Code">
                                </div>
                                <div class="form-group">
                                    <label for="">Giá sản phẩm</label>
                                    <input name="price" type="text" class="form-control" id="price" placeholder="Price">
                                </div>
                                <div class="form-group">
                                    <label for="">Miêu tả</label>
                                    <input name="describe" type="text" class="form-control" id="describe" placeholder="Describe">
                                </div>
                                <div class="form-group">
                                    <label for="">Tên danh mục</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        @foreach($categorys as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Chọn ảnh</label>
                                    <div class="col-md-8">
                                    <input type="file" name="img" id="img"/>
                                    <span id="store_image"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" align="center">
                                <input type="hidden" name="action" id="action" />
                                <input type="hidden" name="hidden_id" id="hidden_id" />
                                <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end-add-modal-product -->
            <!-- modal-delete -->
            <div class="modal fade"  id="modal-delete-product">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" data-url="" id="form-delete-product" method="POST" role="form">
                        @csrf
                            <div class="modal-header">
                                <h4 class="modal-title">Delete product</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Bạn có muốn xóa sản phẩm :<span id="productdelete"></span></label>
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
            <!--end main-->
</body>
</html>
@endsection
<!-- javascript -->
@section('ajax_product')
<script src="js/ajax_product.js">
</script>
@endsection











