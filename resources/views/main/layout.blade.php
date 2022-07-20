<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BAZNAS BatangHari</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admin') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('admin') }}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin') }}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin') }}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin') }}/plugins/summernote/summernote-bs4.min.css">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('soft') }}/assets/img/baznas.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <div class="row">
                <img src="{{ asset('admin') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" width="30px;">
                <h5 class="ml-2">{{ \Auth::user()->name }}</h5>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{ route('logout') }}" class="dropdown-item">
            Logout
          </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset('soft') }}/assets/img/baznas.png" alt="AdminLTE Logo" class=" img-circle" width="60px" style="background-color: white;">
      <span class="brand-text font-weight-light">Baznas BatangHari</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ \Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if (\Auth::user()->level == 'admin')
          <li class="nav-item">
            <a href="{{ route('berita') }}" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
              <p>
                Berita Baznas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('tentangzakat') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Tentang ZIS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Donasi Masuk
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('donasi.zakat') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Zakat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('donasi.infak') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Infak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('donasi.sedekah') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sedekah</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Donasi Keluar
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('donasikeluar') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Zakat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('donasikeluarinfak') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Infak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('donasikeluarsedekah') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sedekah</p>
                </a>
              </li>

            </ul>
            <li class="nav-item">
              <a href="{{ route('kitsaran') }}" class="nav-link">
                <i class="fab fa-wpforms nav-icon"></i>
                <p>Kritik Dan Saran</p>
              </a>
            </li>
          </li>
          @elseif (\Auth::user()->level == 'user')
          <li class="nav-item">
            <a href="{{ route('zakat') }}" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
              <p>
                Donasi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('histori') }}" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
              <p>
                Histori Donasi
              </p>
            </a>
          </li>
          @elseif (\Auth::user()->level == 'sekretaris')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Donasi Masuk
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('donasi.zakat') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Zakat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('donasi.infak') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Infak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('donasi.sedekah') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sedekah</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Donasi Keluar
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('donasikeluar') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Zakat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('donasikeluarinfak') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Infak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('donasikeluarsedekah') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sedekah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('donasikeluarcetak') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cetak</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('scripts')
<!-- jQuery -->
<script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('admin') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('admin') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('admin') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('admin') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('admin') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('admin') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('admin') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('admin') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('admin') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin') }}/dist/js/adminlte.js"></script>
<script src="{{ asset('admin') }}/dist/js/pages/dashboard.js"></script>
</body>
</html>
