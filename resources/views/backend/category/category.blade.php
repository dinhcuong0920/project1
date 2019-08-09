@extends('backend.master.master')
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh mục</li>
			</ol>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý danh mục</h1>
			</div>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
						<span id="form-result"></span>
							<div class="col-md-5">
								<button  id="addcategory" class="btn btn-primary">Thêm danh mục</button>
								<div class="form-group row">
									<div class="col-lg-6">
										<label for="">Danh mục:</label>
										<select class="form-control" name="" id="category_change">
											@foreach($categories as $category)
											<option value="{{$category->id}}">{{$category->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
				<div class="render_page" id="data_render">
					<table id="products_table" class="table table-bordered" style="margin-top:10px;">
						<thead>
							<tr class="bg-primary">
								<th>ID</th>
								<th>Danh mục</th>
								<th>Các sản phẩm trong danh mục</th>
							</tr>
						</thead>
						<tbody class="tbody_product">
							@foreach($categories as $category)
							<tr>
								<td id='category_id'>{{$category->id}}</td>
								<td id='get_category_name'>{{$category->name}}</td>
								<td>
									<ul>
										@foreach($category->products as $product)
										<li>{{$product->name}}  (MSP: {{$product->code}} )</li>
										@endforeach
									</ul>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div align='right'>
						<ul class="pagination">
						</ul>
					</div>
				</div>
			</div>
			<!--/.col-->
		</div>
		<!--/.row-->
	</div>
	<!--/.main-->
			<div class="modal fade" id="modal-add-category">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="form-add-category" data-url="{{route('categories.store')}}" method="POST" role="form">
                            <div class="modal-header">
                                <h4 class="modal-title">Add category</h4>
								<span id="aleart_errors_category"></span>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Tên danh mục</label>
                                    <input name="name" type="text" class="form-control" id="category_name" placeholder="Name">
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
                                        @foreach($categories as $category)
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
@endsection
@section('script_category')
	<script src="js/ajax_category.js"></script>
@endsection


