<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('soft') }}/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('soft') }}/assets/img/baznas.png">
    <title>
        Baznas BatangHari
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/4b5c57cf10.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <!-- Nucleo Icons -->
    <link href="{{ asset('soft') }}/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('soft') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
    <link href="{{ asset('soft') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('soft') }}/assets/css/soft-design-system.css?v=1.0.5" rel="stylesheet"
        type="text/css" />
</head>

<body class="index-page">
    <!-- Navbar -->
    <div class="container position-sticky z-index-sticky top-0">
        @include('navbar')
    </div>
    <header class="header-2">
        <div class="page-header min-vh-75"
            style="background-image: url('{{ asset('soft') }}/assets/img/curved-images/curved.jpg')">
            <div class="container">
                @yield('title')
            </div>
        </div>
    </header>
    <section class="pt-3 pb-4" id="count-stats">
        <div class="container">
            @yield('content')
        </div>
    </section>
    <!-- -------   END PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->
        @include('footer')

    <!--   Core JS Files   -->
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
    <script src="{{ asset('soft') }}/assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="{{ asset('soft') }}/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ asset('soft') }}/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
    <script src="{{ asset('soft') }}/assets/js/plugins/countup.min.js"></script>
    <script src="{{ asset('soft') }}/assets/js/plugins/choices.min.js"></script>
    <script src="{{ asset('soft') }}/assets/js/plugins/prism.min.js"></script>
    {{-- <script src="{{ asset('soft') }}/assets/js/plugins/highlight.min.js"></script> --}}
    <!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
    <script src="{{ asset('soft') }}/assets/js/plugins/rellax.min.js"></script>
    <!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
    <script src="{{ asset('soft') }}/assets/js/plugins/tilt.min.js"></script>
    <!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
    <script src="{{ asset('soft') }}/assets/js/plugins/choices.min.js"></script>
    <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
    <script src="{{ asset('soft') }}/assets/js/plugins/parallax.min.js"></script>
    <!-- Control Center for Soft UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <script src="{{ asset('soft') }}//assets/js/soft-design-system.min.js?v=1.0.5" type="text/javascript"></script>
    <script type="text/javascript">
        if (document.getElementById('state1')) {
            const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
            if (!countUp.error) {
                countUp.start();
            } else {
                console.error(countUp.error);
            }
        }
        if (document.getElementById('state2')) {
            const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
            if (!countUp1.error) {
                countUp1.start();
            } else {
                console.error(countUp1.error);
            }
        }
        if (document.getElementById('state3')) {
            const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
            if (!countUp2.error) {
                countUp2.start();
            } else {
                console.error(countUp2.error);
            };
        }
    </script>
</body>

</html>
