<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/pages/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/iconly/bold.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="shortcut icon"  href="{{ asset('images/favicon.svg" type="image/x-icon')}}">
  	<script src="{{ asset('js/core/jquery.3.2.1.min.js') }}"></script>
</head>

<body style="background-color: #f2f7ff;">
    <div id="app">
        @include('components.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('content')
            

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>{{ \Carbon\Carbon::now()->year}} &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('admin/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{ asset('admin/js/pages/dashboard.js')}}"></script>
    <script src="{{ asset('admin/js/main.js')}}"></script>
</body>

</html>