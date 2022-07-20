<div class="card card-body shadow">
    <form action="{{ url('/donasi/keluar/zakat/simpan') }}" method="POST" id="form-tambah" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="kategoriid" value="1">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>Keterangan</label>
                </div>
                <div class="col-md-6">
                    <input type="text" name="ket" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>Tanggal</label>
                </div>
                <div class="col-md-6">
                    <input type="date" name="tanggal" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>Biaya Pengeluaran</label>
                </div>
                <div class="col-md-6">
                    <input type="text" name="pengeluaran" class="form-control">
                </div>
            </div>
        </div>
        <button class="btn btn-primary float-end" type="submit">Simpan</button>
    </form>
</div>