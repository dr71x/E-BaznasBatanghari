<div class="card card-body mt-5 shadow">
    <form action="{{ route('editzakatSimpan') }}" method="POST" id="form-tambah" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $tentang->id }}">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <h5>Pilih Tipe Berita :</h5>
                </div>
                <div class="col-md-8">
                    <select name="tipe_id" class="form-control">
                        <option value="">Pilih Disini</option>
                        @foreach ($detail as $item)
                            <option value="{{ $item->id }}" {{ $tentang->tipe_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <h5>Judul Berita :</h5>
                </div>
                <div class="col-md-8">
                    <input type="text" name="judul" class="form-control" value="{{ $tentang->judul }}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <h5>Gambar Berita</h5>
                </div>
                <div class="col-md-8">
                    <img src="data:image/{{ $tentang->ext }};base64,{{ $tentang->gambar }}" width="300px" alt="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <h5>
                        Gambar Berita :
                    </h5>
                </div>
                <div class="col-md-8">
                    <input type="file" name="gambar" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <h5>
                        Isi Berita
                    </h5>
                </div>
                <div class="col-md-8">
                    <textarea name="isi" cols="30" rows="10" class="form-control">{{ $tentang->isi }}</textarea>
                </div>
            </div>
        </div>
        <button class="btn btn-primary float-end" type="submit">Simpan</button>
    </form>
</div>