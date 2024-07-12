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
             <h1>ADD USER</h1>
        </header>
        <main class="container">
            <form action="{{ route('users.submitUser') }}" class="" method="post">
                @csrf
                <div >
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div >
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
                
                <div >
                    <label for="">Phong Ban</label>
                    <select name="phongban_id" class="form-control">
                        @foreach ($phongban as $value)
                            <option value="{{ $value -> id }}">{{ $value -> ten_donvi }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div >
                    <label for="">Tuoi</label>
                    <input type="text" name="tuoi" class="form-control">
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="btnSubmit">ADD</button>
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
