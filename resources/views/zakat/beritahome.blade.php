@extends('main.main2')
@section('content')
    <div class="row mt-5">
        @foreach ($berita as $item)
        <div class="col-4">
            <div class="card mt-2 bg-body rounded" style="width: 18rem; box-shadow:0 10px 30px rgba(0,0,0,0.5);">
                <img src="{{ \Storage::url($item->gambar) }}" height="190px" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $item->judul }} <span style="font-size: 10px">{{ $item->created_at->diffForHumans() }}</span></h5>
                  <p class="card-text">{!! Str::substr($item->isi, 0, 50) !!}</p>
                  <a href="{{ route('detail.berita',['id' => $item->id]) }}" class="btn btn-primary">Read More..</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
@endsection
