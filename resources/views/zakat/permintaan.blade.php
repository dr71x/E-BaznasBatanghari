@extends('main.main')
@section('title')
    <div class="row">
        <div class="col-lg-7 text-center mx-auto">
            <h1 class="text-white pt-3 mt-n5">Validasi permintaan Zakat</h1>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-9 z-index-2 border-radius-xl mt-n10 mx-auto py-3 blur shadow-blur">
            <div class="row">
                <div class="col-md-12 position-relative" style="padding: 50px;">
                    <form action="{{ route('permintaan') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <h5>Pilih Jenis Dana</h5>
                        </div>
                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <select name="kategori" class="form-control">
                                        <option value="">Pilih Disini</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $data['kategori'] ? 'selected' : '' }}>{{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>* masukkan Nominal Anda</h5>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>
                                        Nominal
                                    </h5>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" class="form-control" id="rupiah"
                                            value="&ensp; {{ $data['nominal'] }}" name="nominal" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>* Silahkan Lengkapi Data Diri Anda</h5>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>
                                        Sapaan
                                    </h5>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <select name="panggilan" class="form-control">
                                            <option value="">Pilih Disini</option>
                                            @foreach ($sebutan as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $data['panggilan'] ? 'selected' : '' }}>
                                                    {{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-text"><i class="fa-solid fa-circle-arrow-down"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>
                                        Nama Lengkap
                                    </h5>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                        <input type="text" name="nama" value="&ensp; {{ $data['nama'] }}"
                                            class="form-control" placeholder="Ketikkan Disini" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>
                                        E-mail Anda
                                    </h5>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-at"></i></span>
                                        <input type="email" value="&ensp; {{ $data['email'] }}" class="form-control"
                                            placeholder="Ketikkan Disini" name="email" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>
                                        Nomor Handphone
                                    </h5>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-mobile"></i></span>
                                        <input type="text" class="form-control" value="{{ $data['nomor'] }}"
                                            name="nomor" placeholder="Masukkan Nomor Anda" autocomplete="off" id="phone">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn bg-gradient-danger btn-icon"><i class="fa-solid fa-cloud-arrow-up"></i>
                            Lanjutkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            var phone = document.getElementById('phone');
            phone.addEventListener('keyup', function(e) {
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                phone.value = normalisasiNomorHP(this.value);
            });
            var rupiah = document.getElementById('rupiah');
            rupiah.addEventListener('keyup', function(e) {
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                rupiah.value = formatRupiah(this.value);
            });
        });

        function normalisasiNomorHP(phone) {
            phone = String(phone).trim();
            if (phone.startsWith('0')) {
                phone = '+62' + phone.slice(3);
            } else if (phone.startsWith('62')) {
                phone = '+62' + phone.slice(3);
            }
            return phone.replace(/[- .]/g, '');
        };

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        };
    </script>
@endsection
