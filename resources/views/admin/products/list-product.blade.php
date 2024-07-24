@extends("admin.layouts.default");
@section('title') 
    @parent
    Danh Sach San Pham
@endsection
<!-- Main -->
@section("content")
<div class="p-4" style="min-height: 800px;">
    <h4 class="text-primary mb-4">Danh sách sản phẩm</h4>
    <a href="{{ route('admin.products.addProduct') }}"><button class="btn btn-info">Thêm mới</button></a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá sản phẩm</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Image</th>
                <th scope="col">View</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listProduct as $key => $value) 
            <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{$value->name}}</td>
                <td>{{$value->price}}</td>
                <td>
                    {{$value->description}}
                </td>
                <td>
                    {{$value->view}}
                </td>
                <td>
                    <img src="../{{$value->image}}" alt="">
                </td>
                <td>
                    <a href="{{ route('admin.products.editProduct', $value -> product_id) }}">Edit</a> 

                    <form action="{{route('admin.products.deleteProduct', $value -> product_id)}}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" onclick="return confirm('Do you have a delete product?')" class="btn btn-danger">Xoa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $listProduct->links('pagination::bootstrap-5') }}
</div>
@endsection;