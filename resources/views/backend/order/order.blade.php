
@extends('backend.master.master')
@section('content')

	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Đơn hàng</li>
			</ol>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách đơn đặt hàng </div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Tên khách hàng</th>
											<th>Sđt</th>
											<th>Địa chỉ</th>
											<th>Các sản phẩm trong đơn hàng</th>
										</tr>
									</thead>
									<tbody>
										@foreach($orders as $order)
										<tr>
											<td>{{$order->id}}</td>
											<td>{{$order->name}}</td>
											<td>{{$order->telephone}}</td>
											<td>{{$order->address}}</td>
											<td>
												<ul>
													@foreach($order->products as $product)
													<li>{{$product->name}}</li>
													@endforeach
												</ul>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div align='right'></div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->
	</div>
	<!--end main-->
@endsection





