<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header class="container">
            <!-- place navbar here -->
             <h1>Edit Product</h1>
        </header>
        <main class="container">
            <form action="{{ route('products.updateProduct', $product->id) }}" class="" method="post">
                @csrf
                <div >
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                </div>
                
                <div >
                    <label for="">Danh muc</label>
                    <select name="category_id" class="form-control">
                        @foreach ($danhMuc as $value)
                            <option 
                            @if($value->id === $product->category_id)
                                selected
                            @endif
                            value="{{ $value -> id }}" 
                            
                                >{{ $value -> name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div >
                    <label for="">Price</label>
                    <input type="number" name="price" class="form-control" value="{{ $product->price }}">
                </div>

                <div >
                    <label for="">View</label>
                    <input type="number" class="form-control" name="view"  value="{{ $product->view }}">
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="btnSubmit">Update</button>
                </div>

            </form>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
