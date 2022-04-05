@extends('main.main2')
@section('content')
    <div class="row mt-5">
        <div class="card mb-3 mt-5 shadow-lg">
            <img src="{{ \Storage::url($berita->gambar) }}" width="400px" class="card-img">
            <div class="card-body">
              <h5 class="card-title">{{ $berita->judul }} <small class="text-muted ms-2">{{ $berita->created_at->diffForHumans() }}</small> </h5>
              <p class="card-text">{!! $berita->isi !!}</p>
            </div>
          </div>
    </div>
@endsection
