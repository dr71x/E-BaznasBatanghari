<div class="card card-body mb-5 mt-5">
    @if (count($errors) > 0)
    <div class="alert alert-warning" role="alert">
        <h5 align="center" style="color: white">
           Maaf Data Yang Anda Isi Belum Lengkap
        </h5>
    </div>
    @endif
    <form method="POST" action="{{ route('KritikSaran') }}">
        @csrf
        <h5>Bila Anda Punya Pertanyaan, Silahkan Menghubungi Kami.</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nama">Nama *</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                    @if ($errors->first('nama'))
                        <span class="invalid-feedback" role="alert">
                            <strong>Maaf Nama Gak Boleh Kosong</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="telepon">Tentang *</label>
                    <input type="text" class="form-control" id="Tentang" name="tentang" placeholder="Tentang">
                    
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="pesan">Telepon *</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon">
                   
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="pesan">Pesan *</label>
            <textarea class="form-control" id="pesan" name="pesan" rows="3" placeholder="Ketikkan Pesan Anda Disini"></textarea>
            
        </div>
        <h6>Pertanyaan Saudara/i Akan Kami Jawab Melalui Email atau Nomor Telepon
            yang sudah dilampirkan</h6>
        <div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>