@extends("admin.layouts.default");
@section('title') 
    @parent
    Them san pham
@endsection

@section("content")
<div class="p-4" style="min-height: 800px;">
    <main class="container">
        <form action="{{ route('admin.products.submitProduct') }}" class="" method="post" enctype="multipart/form-data">
            @csrf
            <div >
                <label for="">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            
            {{-- <div >
                <label for="">Danh muc</label>
                <select name="category_id" class="form-control">
                    @foreach ($danhMuc as $value)
                        <option value="{{ $value -> id }}">{{ $value -> name }}</option>
                    @endforeach
                </select>
            </div> --}}
            
            <div >
                <label for="">Price</label>
                <input type="number" name="price" class="form-control">
            </div>

            <div >
                <label for="">View</label>
                <input type="number" class="form-control" name="view">
            </div>

            <div >
                <label for="">Description</label>
                <input type="text" class="form-control" name="description">
            </div>

            <div >
                <label for="">Image</label>
                <input type="file" class="form-control" name="image">
            </div>

            <div>
                <button type="submit" class="btn btn-success" name="btnSubmit">ADD</button>
            </div>

        </form>
    </main>
</div>
@endsection
