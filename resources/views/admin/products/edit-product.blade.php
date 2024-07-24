@extends("admin.layouts.default");
@section('title') 
    @parent
    Sua san pham
@endsection

@section("content")
<div class="p-4" style="min-height: 800px;">
    <main class="container">
        <form action="{{ route('admin.products.updateProduct', $product->product_id) }}" class="" method="post" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div >
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="{{$product->name}}">
            </div>
            
            <div >
                <label for="">Price</label>
                <input type="number" name="price" class="form-control" value="{{$product->price}}">
            </div>

            <div >
                <label for="">View</label>
                <input type="number" class="form-control" name="view" value="{{$product->view}}">
            </div>

            <div >
                <label for="">Description</label>
                <input type="text" class="form-control" name="description" value="{{$product->description}}">
            </div>

            <div >
                <label for="">Image</label>
                <img src="{{asset($product->image)}}" alt="" style="width: 50px;">
                <input type="file" class="form-control" name="image">
            </div>

            <div>
                <button type="submit" class="btn btn-success" name="btnSubmit">ADD</button>
            </div>

        </form>
    </main>
</div>
@endsection
