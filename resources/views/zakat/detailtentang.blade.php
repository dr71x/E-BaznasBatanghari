@extends('main.main2')
@section('content')
<div class="row justify-content-center" style="margin-top: 120px; margin-bottom: 150px">
  <div class="col-md-8">
    <div class="card mb-3 mt-5 shadow-lg" style="width: 800px;">
      <img src="data:image/{{ $berita->type }};base64,{{ $berita->gambar }}" class="card-img">
      <div class="card-body">
        <h5 class="card-title">{{ $berita->judul }} <small class="text-muted ms-2">{{ $berita->created_at->diffForHumans() }}</small> </h5>
        <p class="card-text" style="text-align: justify;">{!! nl2br($berita->isi) !!}</p>
      </div>
    </div>
  </div>
</div>
@endsection
