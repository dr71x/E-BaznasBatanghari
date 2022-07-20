@extends('main.layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-body">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('soft') }}/assets/img/1.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('soft') }}/assets/img/3.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('soft') }}/assets/img/4.png" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </button>
          </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
   @if (session('success'))
    Swal.fire({
      icon: 'success',
      title: 'Login Berhasil',
      text: '{{ session('success') }}'
    });
 @endif
</script>
@endsection