@extends('main.main2')
@section('content')
<div class="row mt-5 mb-5" style="right: 50px">
  @foreach ($berita as $item)
  <div class="col-md-4" style="margin-top: 80px;">
        <div class="card mt-2 bg-body rounded" style="width: 18rem; box-shadow:0 10px 30px rgba(0,0,0,0.5);">
          <img src="data:image/{{ $item->ext }};base64,{{ $item->gambar }}" height="190px" class="card-img-top" alt="...">
          <div class="card-body">
            <a class="card-title"><b>{{ $item->judul }}</b> <br> <span style="font-size: 10px">{{ $item->created_at->diffForHumans() }}</span></a>
            <p class="card-text" style="font-size:14px;">{!! Str::substr($item->isi, 0, 50) !!}</p>
            <a href="{{ route('detail.tentang',['id' => $item->id]) }}" class="btn btn-primary">Read More..</a>
          </div>
        </div>
  </div>
  @endforeach
</div>
@endsection
