<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title', 'The Coffee Haven')</title>

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/coffeehaven.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.26.25/sweetalert2.min.css">
</head>
<body class="d-flex flex-column" style="min-height: 100vh;">

    @include('layouts.inc.navbar-public')

    <main class="flex-grow-1">
        @yield('content')
    </main>

    @include('layouts.inc.footer-public')

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.26.25/sweetalert2.all.min.js"></script>

    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "{{ Session::get('success') }}",
                icon: "success",
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    @yield('scripts')
</body>
</html>