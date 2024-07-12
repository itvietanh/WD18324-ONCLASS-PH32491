<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <header class="container">
        <div class="row">
            <div class="col">
                <a href="{{ route('products.addProduct') }}"><button class="btn btn-primary">Add Product</button></a>
            </div>
            <div class="col">
                <h4>Tim kiem</h4>
                @csrf
                <form action="{{ route('products.listProduct') }}" method="get">
                    <div class="row">
                        <div class="col-8">
                            <input type="text" class="form-control w-50" id="search" name="kyw" placeholder="Search...">
                        </div>

                        <div class="col-4">
                            <input type="submit" class="btn btn-success" name="btnSumit">

                        </div>

                    </div>
                </form>
            </div>
        </div>

    </header>
    <main>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Danh Muc</th>
                <th>Gia</th>
                <th>Luot xem</th>
                <th>ACtion</th>
            </thead>

            <tbody>
                @foreach($products as $value)
                <tr>
                    <td>{{$value -> id}}</td>
                    <td>{{$value -> name}}</td>
                    <td>{{$value -> catName}}</td>
                    <td>{{$value -> price}}</td>
                    <td>{{$value -> view}}</td>
                    <td><a href="{{ route('products.editProduct', $value -> id) }}">Edit</a> | <a href="{{ route('products.deleteProduct', $value -> id) }}">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>