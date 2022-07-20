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
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('soft') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('soft') }}/assets/css/soft-design-system.css?v=1.0.7" rel="stylesheet" />
</head>

<body class="about-us">
  <!-- Navbar Transparent -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent " >
    <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav
                        class="navbar navbar-expand-lg  blur blur-rounded top-0  z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                        <div class="container-fluid px-0">
                            <img src="{{ asset('soft') }}/assets/img/baznas.png" width="30px" class="ms-3">
                            <a class="navbar-brand font-weight-bolder ms-sm-3" href="{{ route('home') }}" rel="tooltip"
                                title="Designed and Coded by Creative Tim" data-placement="bottom">
                                BAZNAS BatangHari
                            </a>
                            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon mt-2">
                                    <span class="navbar-toggler-bar bar1"></span>
                                    <span class="navbar-toggler-bar bar2"></span>
                                    <span class="navbar-toggler-bar bar3"></span>
                                </span>
                            </button>
                            <div class="collapse navbar-collapse mt-3 pt-3 pb-2 py-lg-0 w-100" id="navigation">
                                <ul class="navbar-nav navbar-nav-hover ms-lg-10 ps-lg-5 w-100">
                                    <li class="nav-item dropdown dropdown-hover mx-2">
                                        <a href="{{ route('tentang.kami') }}" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center">
                                            Tentang Kami
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown dropdown-hover mx-2">
                                      <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                                          id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                                          Tentang ZIS
                                          <img src="{{ asset('soft') }}/assets/img/down-arrow-dark.svg" alt="down-arrow"
                                              class="arrow ms-1">
                                      </a>
                                      <div class="dropdown-menu dropdown-menu-animation dropdown-md p-3 border-radius-lg mt-0 mt-lg-3"
                                          aria-labelledby="dropdownMenuPages">
                                          <div class="d-none d-lg-block">
                                              @foreach (\App\Models\detail::where('zis','=','0')->get() as $item)
                                              <a href="{{ route('home.tentang',["id" => $item->id]) }}"
                                              class="dropdown-item border-radius-md">
                                              <span class="ps-3">{{ $item->nama }}</span>
                                              </a>
                                              @endforeach
                                          </div>
                                          <div class="d-lg-none">
                                              <h6
                                                  class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0">
                                                  <div class="d-inline-block">
                                                      <div
                                                          class="icon icon-shape icon-xs border-radius-md bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                                                          <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                                                              xmlns="http://www.w3.org/2000/svg"
                                                              xmlns:xlink="http://www.w3.org/1999/xlink">
                                                              <title>shop </title>
                                                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                  <g transform="translate(-1716.000000, -439.000000)"
                                                                      fill="#FFFFFF" fill-rule="nonzero">
                                                                      <g transform="translate(1716.000000, 291.000000)">
                                                                          <g transform="translate(0.000000, 148.000000)">
                                                                              <path
                                                                                  d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"
                                                                                  opacity="0.598981585"></path>
                                                                              <path
                                                                                  d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                                              </path>
                                                                          </g>
                                                                      </g>
                                                                  </g>
                                                              </g>
                                                          </svg>
                                                      </div>
                                                  </div>
                                                  Landing Pages
                                              </h6>
                                              <a href="{{ asset('soft') }}/pages/about-us.html"
                                                  class="dropdown-item border-radius-md">
                                                  <span class="ps-3">About Us</span>
                                              </a>
                                              <a href="{{ asset('soft') }}/pages/contact-us.html"
                                                  class="dropdown-item border-radius-md">
                                                  <span class="ps-3">Contact Us</span>
                                              </a>
                                              <a href="{{ asset('soft') }}/pages/author.html"
                                                  class="dropdown-item border-radius-md">
                                                  <span class="ps-3">Author</span>
                                              </a>
                                              <h6
                                                  class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0 mt-3">
                                                  <div class="d-inline-block">
                                                      <div
                                                          class="icon icon-shape icon-xs border-radius-md bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center ps-0">
                                                          <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                                              xmlns="http://www.w3.org/2000/svg"
                                                              xmlns:xlink="http://www.w3.org/1999/xlink">
                                                              <title>office</title>
                                                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                  <g transform="translate(-1869.000000, -293.000000)"
                                                                      fill="#FFFFFF" fill-rule="nonzero">
                                                                      <g transform="translate(1716.000000, 291.000000)">
                                                                          <g transform="translate(153.000000, 2.000000)">
                                                                              <path
                                                                                  d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"
                                                                                  opacity="0.6"></path>
                                                                              <path
                                                                                  d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                                                              </path>
                                                                          </g>
                                                                      </g>
                                                                  </g>
                                                              </g>
                                                          </svg>
                                                      </div>
                                                  </div>
                                                  Account
                                              </h6>
                                              <a href="{{ asset('soft') }}/pages/sign-in.html"
                                                  class="dropdown-item border-radius-md">
                                                  <span class="ps-3">Sign In</span>
                                              </a>
                                          </div>
                                      </div>
                                  </li>
                                    <li class="nav-item dropdown dropdown-hover mx-2">
                                        <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                                            id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                                            Berita BAZNAS
                                            <img src="{{ asset('soft') }}/assets/img/down-arrow-dark.svg" alt="down-arrow"
                                                class="arrow ms-1">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-animation dropdown-md p-3 border-radius-lg mt-0 mt-lg-3"
                                            aria-labelledby="dropdownMenuPages">
                                            <div class="d-none d-lg-block">
                                                @foreach (\App\Models\tipe::get() as $item)
                                                    <a href="{{ route('home.berita',['id' => $item->id]) }}"
                                                    class="dropdown-item border-radius-md">
                                                    <span class="ps-3">{{ $item->nama }}</span>
                                                    </a>
                                                @endforeach
                                            </div>
                                            <div class="d-lg-none">
                                                <h6
                                                    class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0">
                                                    <div class="d-inline-block">
                                                        <div
                                                            class="icon icon-shape icon-xs border-radius-md bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                                                            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                <title>shop </title>
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <g transform="translate(-1716.000000, -439.000000)"
                                                                        fill="#FFFFFF" fill-rule="nonzero">
                                                                        <g transform="translate(1716.000000, 291.000000)">
                                                                            <g transform="translate(0.000000, 148.000000)">
                                                                                <path
                                                                                    d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"
                                                                                    opacity="0.598981585"></path>
                                                                                <path
                                                                                    d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                                                </path>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    Landing Pages
                                                </h6>
                                                <a href="{{ asset('soft') }}/pages/about-us.html"
                                                    class="dropdown-item border-radius-md">
                                                    <span class="ps-3">About Us</span>
                                                </a>
                                                <a href="{{ asset('soft') }}/pages/contact-us.html"
                                                    class="dropdown-item border-radius-md">
                                                    <span class="ps-3">Contact Us</span>
                                                </a>
                                                <a href="{{ asset('soft') }}/pages/author.html"
                                                    class="dropdown-item border-radius-md">
                                                    <span class="ps-3">Author</span>
                                                </a>
                                                <h6
                                                    class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0 mt-3">
                                                    <div class="d-inline-block">
                                                        <div
                                                            class="icon icon-shape icon-xs border-radius-md bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center ps-0">
                                                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                <title>office</title>
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <g transform="translate(-1869.000000, -293.000000)"
                                                                        fill="#FFFFFF" fill-rule="nonzero">
                                                                        <g transform="translate(1716.000000, 291.000000)">
                                                                            <g transform="translate(153.000000, 2.000000)">
                                                                                <path
                                                                                    d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"
                                                                                    opacity="0.6"></path>
                                                                                <path
                                                                                    d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                                                                </path>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    Account
                                                </h6>
                                                <a href="{{ asset('soft') }}/pages/sign-in.html"
                                                    class="dropdown-item border-radius-md">
                                                    <span class="ps-3">Sign In</span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown dropdown-hover mx-2">
                                      <a href="{{ route('calculator') }}" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center">
                                          Calculator zakat
                                      </a>
                                  </li>
                                    <li class="nav-item dropdown dropdown-hover mx-2">
                                      <a href="{{ route('faq') }}" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center">
                                          Faq
                                      </a>
                                  </li>
                                    <li class="nav-item mx-2">
                                        <a href="{{ route('zakat') }}"
                                            class="btn bg-gradient-primary nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                                            style="color: white">Bayar
                                            Zakat</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
        </div>
      </nav>
  </nav>
  <!-- End Navbar -->
  <!-- -------- START HEADER 7 w/ text and video ------- -->
  <header class="bg-gradient-dark">
    <div class="page-header min-vh-75" style="background-image: url('{{ asset('soft') }}/assets/img/office-dark.jpg');">
      <span class="mask bg-gradient-success opacity-8"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 text-center mx-auto my-auto">
            <h1 class="text-white">Tentang BAZNAS BatangHari</h1>
          </div>
        </div>
      </div>
      <div class="position-absolute w-100 z-index-1 bottom-0">
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
          <defs>
            <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
          </defs>
          <g class="moving-waves">
            <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />
            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
            <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
            <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
            <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
            <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,1" />
          </g>
        </svg>
      </div>
    </div>
  </header>
  <section class="py-4">
    <div class="container">
        <div class="card card-body" style="box-shadow: 0 10px 15px rgba(0,0,0,0.6)">
            <h5>Sejarah BAZNAS</h5>
            <p align="justify">
                Badan Amil Zakat (BAZ) Kabupaten Batang Hari berdiri tahun 2001 dengan Surat Keputusan Bupati Batang Hari Nomor 337 Tahun 2001 Tanggal 28 Juni 2001 Tentang Pembentukan Pengurus Badan Amil Zkata Daerah (BAZDA) Kabupaten Batang Hari berdasarkan undang-undang Nomor 38 tahun 1999 tentang pengelolaan zakat. Badan Amil Zakat Daerah (BAZDA) Kabupaten Batang Hari pertamkali bersekretariat di gedung ex. DPRD Kabupaten Batang Hari.
            </p>
            <p align="justify">
                Pada tahun 2014 sesuai dengan undang-undang nomor 23 tahun 2011 dan peraturan pemerintah nomor 14 tahun 2014, Badan Amil Zakat Daerah (BAZDA) Kabupaten Batang Hari berdasarkan Batang Hari beralih fungsi menjadi Badan Amil Zakat Nasional (BAZNAS) Kabupaten Batang Hari berdasarkan surat keputusan Direktur Jendral Bimbingan Masyarakat Islam Kementrian Agama Nomor : DJ.II/568 tahun 2014 tentang pembentukan Badan Amil Zakat Nasional Kabupaten/Kota atas susulan pemerintahan daerah. Hingga saat ini (tahun 2020) gedung kantor BAZNAS Kabupaten Batang Hari mengontrak di Sekretariat Masjid Baiturrahim Jalan Kalimanta nomor 61 Muara Bulian.
            </p>
        </div>
    </div>
  </section>
  <section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="card shadow-lg" style="padding: 43px">
                    <h5>Visi BAZNAS Batang Hari</h5>
                    <p>
                        “Menjadi Badan Amil Zakat Nasional Kabupaten Batang Hari yang amanah, transparan dan propesional”
                    </p>
                    <h5>
                        Misi BAZNAS Batang Hari
                    </h5>
                    <p>
                        1.	Meningkatkan kesadaran umat untuk berzakat melalui amil zakat <br>
                        2.	Meningkatkan penghimpunan dan pendayagunaan zakat dan infaq sesuai dengan syari’at Islam <br>
                        3.	Menumbuh kembangkan pengelola/amil zakat yang amanah, transparan, propesional dan terintegrasi <br>
                        4.	Mewujudkan pusat data zakat dan infaq <br>
                        5.	Memaksimalkan peran zakat dalam menanggulangi kemiskinan di Kabupaten Batang Hari melalui sinergi dan koordinasi dengan lembaga terkait. <br>
                    </p>
                </div>
            </div>
            <div class="col-lg-3 ms-auto mt-lg-0 mt-4">
                <div class="card shadow-lg">
                  <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                    <div class="d-block blur-shadow-image">
                      <img src="{{ asset('soft') }}/assets/img/baznas.png" alt="img-blur-shadow" class="img-fluid shadow">
                    </div>
                    <div class="colored-shadow" style="background-image: url(&quot;https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/funny.jpg&quot;);"></div>
                  </div>
                  <div class="card-body">
                    <a href="javascript:;">
                      <h5 class="mt-3" align="center">
                        Logo BAZNAS Batang Hari
                      </h5>
                    </a>
                  </div>
                </div>
              </div>
        </div>
    </div>
  </section>
  <section class="py-4">
      <div class="container">
          <div class="card shadow-lg" style="padding: 20px;background: green;">
                <h5 align="center" style="color: white">
                    MOTTO
                </h5>
                <h5 align="center" style="color: white">
                    TIADA HARI TANPA JIHAD FISABILILLAH
</h5>
          </div>
      </div>
  </section>
  <section class="py-4">
    <div class="container">
    <div class="card card-body" style="box-shadow: 0 10px 15px rgba(0,0,0,0.6)">
      <img src="{{ asset('baru') }}/images/struktur.png" alt="">
    </div>
    </div>
  </section>
    @include('footer')
  <!--   Core JS Files   -->
  <script src="{{ asset('soft') }}/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="{{ asset('soft') }}/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="{{ asset('soft') }}/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
  <script src="{{ asset('soft') }}/assets/js/plugins/countup.min.js"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="{{ asset('soft') }}/assets/js/plugins/parallax.min.js"></script>
  <!-- Control Center for Soft UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="{{ asset('soft') }}/assets/js/soft-design-system.min.js?v=1.0.7" type="text/javascript"></script>
  <script>
    // get the element to animate
    var element = document.getElementById('count-stats');
    var elementHeight = element.clientHeight;

    // listen for scroll event and call animate function

    document.addEventListener('scroll', animate);

    // check if element is in view
    function inView() {
      // get window height
      var windowHeight = window.innerHeight;
      // get number of pixels that the document is scrolled
      var scrollY = window.scrollY || window.pageYOffset;
      // get current scroll position (distance from the top of the page to the bottom of the current viewport)
      var scrollPosition = scrollY + windowHeight;
      // get element position (distance from the top of the page to the bottom of the element)
      var elementPosition = element.getBoundingClientRect().top + scrollY + elementHeight;

      // is scroll position greater than element position? (is element in view?)
      if (scrollPosition > elementPosition) {
        return true;
      }

      return false;
    }

    var animateComplete = true;
    // animate element when it is in view
    function animate() {

      // is element in view?
      if (inView()) {
        if (animateComplete) {
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
          animateComplete = false;
        }
      }
    }

    if (document.getElementById('typed')) {
      var typed = new Typed("#typed", {
        stringsElement: '#typed-strings',
        typeSpeed: 90,
        backSpeed: 90,
        backDelay: 200,
        startDelay: 500,
        loop: true
      });
    }
  </script>
  <script>
    if (document.getElementsByClassName('page-header')) {
      window.addEventListener('scroll', function() {
        var scrollPosition = window.pageYOffset;
        var bgParallax = document.querySelector('.page-header');
        var limit = bgParallax.offsetTop + bgParallax.offsetHeight;
        if (scrollPosition > bgParallax.offsetTop && scrollPosition <= limit) {
          bgParallax.style.backgroundPositionY = (50 - 10 * scrollPosition / limit * 3) + '%';
        } else {
          bgParallax.style.backgroundPositionY = '50%';
        }
      });
    }
  </script>
</body>

</html>