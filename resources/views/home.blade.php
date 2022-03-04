@extends('main.main2')
@section('content')
    <div class="page-header min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex flex-column mx-auto">
                    <div class="card mt-5 shadow">
                        <div class="card-body">
                            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('soft') }}/assets/img/1.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('soft') }}/assets/img/3.png" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('soft') }}/assets/img/4.png" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                        </div>
                                    </div>
                                    <div class="col-md-4"
                                        style="position: absolute; z-index: 100; margin-top: 300px; margin-left: 20px">
                                        <h5
                                            style="color:black;text-shadow: 2px 2px rgb(255, 255,255);
                                                                                                                    ;font-weight: 1000;">
                                            Ayo Bayar Zakat Sekarang !!
                                        </h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ route('zakat') }}" class="btn btn-icon btn-3 ms-3 btn-primary"
                                            style="position: absolute; z-index: 100; margin-top: 350px;" type="button">
                                            <span class="btn-inner--icon"><i class="fab fa-paypal"></i></span>
                                            <span class="btn-inner--text">Bayar Zakat</span>
                                        </a>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
