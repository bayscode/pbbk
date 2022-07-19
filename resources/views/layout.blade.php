<!doctype html>
<html lang="en">

<head>
    <link rel="icon" href="{{ asset('img/Icon.png') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BayShop | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    {{-- BoxIcons --}}
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    {{-- jQuery --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.2/css/uikit.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.uikit.min.css">
</head>

<body>
    @include('sweetalert::alert')
    @include('partials.navbar') {{-- Navbar --}}

    @yield('body')

    {{-- <div class="bg-primary">
        <div class="container-fluid text-white text-center p-3">
            &copy; 2022 Seluruh Hak Cipta Dilindungi dibuat dengan <i class="bi bi-heart-fill text-danger"></i> oleh
            Muhamad Iqbal Aditya Putra(021190035)
        </div>
    </div> --}}

    <div class="text-center text-white pt-2 pb-2 footer-iqbal" style="background-color: #30317C">
        &copy; 2022 Seluruh Hak Cipta Dilindungi dibuat dengan <i class="bi bi-heart-fill text-danger"></i> oleh Muhamad Iqbal Aditya Putra(021190035)</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.uikit.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>
