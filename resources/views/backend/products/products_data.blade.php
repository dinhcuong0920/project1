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
<script src="/admins/js/search_product.js"></script>



