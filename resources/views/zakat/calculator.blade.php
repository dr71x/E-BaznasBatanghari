@extends('main.main2')
@section('content')
    <div class="row">
        <div class="card card-body" style="margin-top: 150px">
            <h5 align="center">KALKULATOR ZAKAT</h5></br>
            <p align="justify">Kalkulator zakat adalah layanan untuk mempermudah perhitungan jumlah zakat yang harus ditunaikan oleh setiap umat muslim sesuai ketetapan syariah. Oleh karena itu, bagi Anda yang ingin mengetahui berapa jumlah zakat yang harus ditunaikan, silahkan gunakan fasilitas Kalkulator Zakat BAZNAS dibawah ini</p>
            <hr color="black">
                <div class="form-group">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <label for="">Pilih Jenis Zakat</label>
                            <select name="jenis" class="form-control" id="pilih">
                                <option value="">Pilih Disini</option>
                                @foreach ($detail as $item)
                                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div id="fitrah" style="display: none">
                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <p align="justify">Zakat fitrah sebaiknya dilaksanakan sebelum sholat Idul Fitri. Walaupun demikian, ada baiknya juga kita melaksanakan zakat fitrah kita sebelum hari raya supaya kewajiban kita terpenuhi lebih cepat. Mengapa Sahabat perlu mengetahui waktu wajib zakat fitrah? Karena terlewat dari waktu tersebut maka haram untuk memberikan zakat fitrah.</p>
                                <p align="justify">Besaran yang berbeda-beda dari makanan pokok yang dizakatkan, membuat banyak perdebatan. Oleh sebab itu, Badan Amil Zakat Nasional (Baznas) telah menentukan aturan zakat fitrah di Indonesia. Jumlah zakat fitrah yang diwajibkan sebesar 2,5 kg atau 3,5 liter makanan pokok, untuk setiap jiwa. Makanan pokok di Indonesia disepakati adalah beras.</p>
                                <label for="">Beras/kg</label>
                                <input type="number" name="beras" id="beras" class="form-control" placeholder="Masukkan Jumlah beras">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <label for="">Jumlah Jiwa</label>
                                <input type="number" name="jiwa" id="orang" class="form-control" placeholder="Masukkan Jumlah Jiwa">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="penghasilan" style="display: none">
                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <p align="justify">Zakat penghasilan atau yang dikenal juga sebagai zakat profesi adalah bagian dari zakat maal yang wajib dikeluarkan atas harta yang berasal dari pendapatan / penghasilan rutin dari pekerjaan yang tidak melanggar syariah. Nishab zakat penghasilan sebesar 85 gram emas per tahun. Kadar zakat penghasilan senilai 2,5%.
                                Dalam praktiknya, zakat penghasilan dapat ditunaikan setiap bulan dengan nilai nishab per bulannya adalah setara dengan nilai seperduabelas dari 85 gram emas, dengan kadar 2,5%.
                                Jadi apabila penghasilan setiap bulan telah melebihi nilai nishab bulanan, maka wajib dikeluarkan zakatnya sebesar 2,5% dari penghasilannya tersebut. (Sumber: Al Qur'an Surah Al Baqarah ayat 267, Peraturan Menteri Agama Nomer 31 Tahun 2019, Fatwa MUI Nomer 3 Tahun 2003, dan pendapat Shaikh Yusuf Qardawi).</p>
                                <label for="">Gaji</label>
                                <input type="number" name="gaji" id="gaji" class="form-control" placeholder="Masukkan Jumlah Nominal Gaji">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="maal" style="display: none">
                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <p align="justify">Zakat maal yang dimaksud dalam perhitungan ini adalah zakat yang dikenakan atas uang, emas, surat berharga, dan aset yang disewakan. Tidak termasuk harta pertanian, pertambangan, dan lain-lain yang diatur dalam UU No.23/2011 tentang pengelolaan zakat.
                                Zakat maal harus sudah mencapai nishab (batas minimum) dan terbebas dari hutang serta kepemilikan telah mencapai 1 tahun (haul). Nishab zakat maal sebesar 85 gram emas. Kadar zakatnya senilai 2,5%.
                                (Sumber: Al Qur'an Surah Al Baqarah ayat 267, Peraturan Menteri Agama Nomer 31 Tahun 2019, Fatwa MUI Nomer 3 Tahun 2003, dan pendapat Shaikh Yusuf Qardawi).</p> 
                                <p align="justify">Standar harga emas yg digunakan untuk 1 gram nya adalah Rp915.000,-. Sementara nishab yang digunakan adalah sebesar 85 gram emas.</p>
                                <label for="">Emas/Perak/Permata</label>
                                <input type="number" name="beratmall" id="beratmall" class="form-control" placeholder="Masukkan Jumlah permata">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <label for="">Uang tunai, tabungan</label>
                                <input type="number" name="uangmall" id="uangmall" class="form-control" placeholder="Masukkan Jumlah Uang">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group" id="tombol">
                    <div class="row justify-content-center">
                       <div class="col-md-6">
                        <button class="btn btn-warning" id="hitung">Hitung Zakat</button>
                       </div>
                    </div>
                </div>
                <div id="loading" style="display: none">
                    <div class="row justify-content-center">
                        <div class="col-md-1">
                            <div class="spinner-border text-warning" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h5>Loading...</h5>
                        </div>
                    </div>
                </div>
                <div id="hasil" style="display: none;">
                    <div class="row justify-content-center">
                        <h5 id="hasilnilai" align="center"></h5>
                        <h5 id="hasilnilai1" align="center"></h5>
                    </div>
                    <div class="row justify-content-center">
                          <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-primary" align="center" id="rollback">Hitung Lagi</button> 
                                    <a href="{{ route('zakat') }}" class="btn btn-success">Bayar Sekarang</a>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#pilih').change(function(){
                var id = $(this).val();
                if (id == "ZAKAT FITRAH") {
                    $('#fitrah').slideDown();
                    $('#penghasilan').slideUp();
                    $('#maal').slideUp();
                    $('#loading').hide();
                    $('#tombol').show();
                    $('#hasil').hide();
                    $('#hasilnilai').hide();
                    $('#hasilnilai1').hide();
                }
                if (id == "ZAKAT PENGHASILAN") {
                    $('#fitrah').slideUp();
                    $('#penghasilan').slideDown();
                    $('#maal').slideUp();
                    $('#loading').hide();
                    $('#tombol').show();
                    $('#hasil').hide();
                    $('#hasilnilai').hide();
                    $('#hasilnilai1').hide();
                }
                if (id == "ZAKAT MAAL") {
                    $('#fitrah').slideUp();
                    $('#penghasilan').slideUp();
                    $('#maal').slideDown();
                    $('#loading').hide();
                    $('#tombol').show();
                    $('#hasil').hide();
                    $('#hasilnilai').hide();
                    $('#hasilnilai1').hide();
                }
                if(id == ""){
                    $('#fitrah').slideUp();
                    $('#penghasilan').slideUp();
                    $('#maal').slideUp();
                    $('#loading').hide();
                    $('#tombol').show();
                    $('#hasil').hide();
                    $('#hasilnilai').hide();
                    $('#hasilnilai1').hide();
                }
            });

            $("#rollback").on('click', function(){
                $('#fitrah').slideUp();
                $('#penghasilan').slideUp();
                $('#maal').slideUp();
                $('#loading').hide();
                $('#tombol').show();
                $('#hasil').hide();
                $('#hasilnilai').hide();
                $('#hasilnilai1').hide();
                $('#hitung').show();
            });

            $("#hitung").on('click',function(){
                $("#tombol").slideUp();
                $('#fitrah').slideUp();
                $('#penghasilan').slideUp();
                $('#maal').slideUp();
                $('#loading').slideDown();
                setTimeout(() => {
                    $('#loading').hide();
                    $('#hasil').slideDown();
                    if ($('#pilih').val() == "ZAKAT FITRAH") {
                        var beras = $('#beras').val();
                        var orang = $('#orang').val();
                        if (beras == "") {
                            $('#hasilnilai').slideDown();
                            $('#hasilnilai').text("Jumlah beras tidak boleh kosong");
                            $('#hasilnilai1').text("");
                        } else {
                            var hasil = beras * 2.5;
                            var hasil1 = hasil * orang;
                            $('#hasilnilai').slideDown();
                            $('#hasilnilai').html("Total Bayar zakat" + " " + "Rp." + hasil1 + "<br>" + "Untuk "+ orang + " " + "orang");
                        }
                    }
                    if ($('#pilih').val() == "ZAKAT PENGHASILAN") {
                        var gaji = $('#gaji').val();
                        if (gaji == "") {
                            $('#hasilnilai').slideDown();
                            $('#hasilnilai').text("Jumlah gaji tidak boleh kosong");
                            $('#hasilnilai1').text("");
                        } else {
                            var hasil = gaji * 0.025;
                            if (gaji >= 7000000) {
                                $('#hasilnilai').slideDown();
                                $('#hasilnilai1').slideDown();
                                $('#hasilnilai').text("Jumlah Zakat Penghasilan Anda");
                                $('#hasilnilai1').text("Rp." + hasil);
                            }else{
                                $('#hasilnilai').slideDown();
                                $('#hasilnilai1').slideDown();
                                $('#hasilnilai').text("Penghasilan Anda Belum Mencapai Nishab");
                                $('#hasilnilai1').text("Rp. 0");
                            }
                        }
                    }
                    if ($('#pilih').val() == "ZAKAT MAAL") {
                        var beratmall = $('#beratmall').val();
                        var uangmall = $('#uangmall').val();
                        if (beratmall == "" || uangmall == "") {
                            $('#hasilnilai').slideDown();
                            $('#hasilnilai').text("Data Belum Lengkap");
                        }
                        else{
                            var hasil = beratmall * 0.025;
                            var hasil1 = uangmall * 0.025;
                            
                            if (beratmall >= 78000000) {
                                $('#hasilnilai').slideDown();
                                $('#hasilnilai').html("ZAKAT MAAL = BAYAR ZAKAT" + "<br>" + "Rp." + Math.round(hasil));
                            }else{
                                $('#hasilnilai').slideDown();
                                $('#hasilnilai').html("ZAKAT MAAL = TIDAK BAYAR ZAKAT");
                            }
                            if (uangmall >= 80000000) {
                                $('#hasilnilai1').slideDown();
                                $('#hasilnilai1').html("ZAKAT TABUNGAN = BAYAR ZAKAT" + "<br>" + "Yang Harus Dibayar Rp." + Math.round(hasil1));
                            }else{
                                $('#hasilnilai1').slideDown();
                                $('#hasilnilai1').html("ZAKAT TABUNGAN = TIDAK BAYAR ZAKAT");
                            }
                        }
                        if (beratmall == "") {
                            var hasil = uangmall * 0.025;
                            if (uangmall >= 78000000) {
                                $('#hasilnilai1').slideDown();
                                $('#hasilnilai1').html("ZAKAT TABUNGAN = BAYAR ZAKAT" + "<br>" + "Yang Harus Dibayar Rp." + Math.round(hasil));
                            }else{
                                $('#hasilnilai1').slideDown();
                                $('#hasilnilai1').html("ZAKAT TABUNGAN = TIDAK BAYAR ZAKAT");
                            }
                        }
                        if (uangmall == "") {
                            var hasil1 = beratmall * 0.025;
                            if ( beratmall >= 80000000) {
                                $('#hasilnilai').slideDown();
                                $('#hasilnilai').html("ZAKAT MAAL = BAYAR ZAKAT" + "<br>" + "Rp." + Math.round(hasil1));
                            }else{
                                $('#hasilnilai').slideDown();
                                $('#hasilnilai').html("ZAKAT MAAL = TIDAK BAYAR ZAKAT");
                            }
                        }
                    }
                }, 3000);
            });
        });
    </script>
@endsection