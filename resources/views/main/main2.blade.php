<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('soft') }}/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('soft') }}/assets/img/baznas.png">
    <title>
        BAZNAS BatangHari
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('soft') }}/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('soft') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/4b5c57cf10.js" crossorigin="anonymous"></script>
    <link href="{{ asset('soft') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('soft') }}/assets/css/soft-design-system.css?v=1.0.5" rel="stylesheet" />
</head>

<body class="sign-in-illustration">
    <!-- Navbar -->
    <div class="container position-sticky z-index-sticky top-0">
        @include('navbar')
    </div>
    <div class="page-header min-vh-100" style="margin-button: 50px;">
        <div class="container">
            @yield('content')
        </div>
    </div>
        @include('footer')
        <script src="https://code.jquery.com/jquery-3.4.1.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
        </script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            @if (session('errorse'))
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('errorse') }}',
                });
            @endif
            @if (session('success'))
                Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                });
            @endif
        </script>
        @yield('script')
    <!--   Core JS Files   -->
    <script src="{{ asset('soft') }}/assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="{{ asset('soft') }}/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ asset('soft') }}/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('soft') }}/assets/js/plugins/parallax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <script src="{{ asset('soft') }}/assets/js/soft-design-system.min.js?v=1.0.5" type="text/javascript"></script>
</body>

</html>
