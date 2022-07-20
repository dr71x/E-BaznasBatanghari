@extends('main.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4 shadow" style="padding: 55px;">
            <form action="#" id="donation_form" method="POST">
                <div class="form-group">
                    <h5>Pilih Jenis Dana</h5>
                </div>
                <input type="hidden" name="userid" id="userid" value="{{ \Auth::user()->id }}">
                <div class="form-group">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="">Pilih Disini</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <select name="detail" class="form-control" id="detail">
                                <option value="">Pilih Disini</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <h5>* Masukkan Nominal Anda</h5>
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
                                <input type="text" class="form-control" id="rupiah" name="nominal">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <h5>* Silahkan Lengkapi Data DiBawah Ini</h5>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>
                                Tujuan :
                            </h5>
                        </div>
                        <div class="col-md-8">
                            <select name="tujuan" id="tujuan" class="form-control">
                                <option value="">Ketikkan Disini</option>
                                <option value="ayah">Ayah</option>
                                <option value="ibu">Ibu</option>
                                <option value="anak">Anak</option>
                                <option value="suami">Suami</option>
                                <option value="istri">Istri</option>
                                <option value="Diri Sendiri">Diri Sendiri</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Nama Tujuan :</h5>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="namaTujuan" name="namaTujuan" placeholder="ketikkan disini">
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
                                <input type="text" class="form-control" name="nomor"
                                    placeholder="Masukkan Nomor Anda" autocomplete="off" id="phone">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group" id="doa" style="display: none;">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <img src="{{asset('soft')}}/assets/img/niat.jpg" class="center" width="600px" alt="">
                        </div>
                        <div class="col-md-8">
                            <p align="center">“Nawaitu an ukhrija zakata maali fardhan lillahi ta’aala.” <br>
                                Aku niat mengeluarkan zakat hartaku fardhu karena Allah Ta’ala.</p>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn bg-gradient-danger btn-primary">Pay!</button>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENTKEY') }}">
    </script>
    <script>
        $('#donation_form').submit(function(event) {
            event.preventDefault();
            $.post("/api/donasi", {
                    _method: 'POST',
                    _token: '{{ csrf_token() }}',
                    donor_name: $('input#nama').val(),
                    kategoriid: $('select#kategori').val(),
                    donor_email: $('input#email').val(),
                    donation_type: $('select#detail').val(),
                    amount: $('input#rupiah').val(),
                    phone: $('input#phone').val(),
                    userid: $('#userid').val(),
                    tujuan: $('select#tujuan').val(),
                    namaTujuan: $('input#namaTujuan').val(),
                },
                function(data, status) {
                console.log(data);
                window.snap.pay(data.snap_token, {
                    // Optional
                    onSuccess: function(result) {
                        console.log(JSON.stringify(result, null, 2));
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                            })
                            Toast.fire({
                            icon: 'success',
                            title: 'Pembayaran Berhasil Dilakukan, Status Pembayaran : Success'
                            });
                            location.replace('/zakat');
                    },
                    // Optional
                    onPending: function(result) {
                        console.log(JSON.stringify(result, null, 2));
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                            })

                            Toast.fire({
                            icon: 'success',
                            title: 'Pembayaran Di Berhasil Dilakukan, Status Pembayaran : Pending'
                            });
                            location.replace('/zakat');
                    },
                    // Optional
                    onError: function(result) {
                        console.log(JSON.stringify(result, null, 2));
                        location.replace('/zakat');
                    }
                });
                return false;
            });
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var phone = document.getElementById('phone');
            phone.addEventListener('keyup', function(e) {
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                phone.value = normalisasiNomorHP(this.value);
            });
            // var rupiah = document.getElementById('rupiah');
            // rupiah.addEventListener('keyup', function(e) {
            //     // tambahkan 'Rp.' pada saat form di ketik
            //     // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            //     rupiah.value = formatRupiah(this.value);
            // });

            $('#kategori').change(function(event) {
                var id = $(this).val();
                $.ajax({
                    url: "{{ url('/kategori/detail') }}/" + id,
                    type: 'GET',
                    success: function(data) {
                        $('#detail').html(data);
                        // alert(data);
                    }
                });
            });

            $('#kategori').change(function(){
                var id = $(this).val();
                if (id == "1") {
                    $("#doa").slideDown('fast');
                }else{
                    $("#doa").slideUp('fast');
                }
            })

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

        // function formatRupiah(angka, prefix) {
        //     var number_string = angka.replace(/[^,\d]/g, '').toString(),
        //         split = number_string.split(','),
        //         sisa = split[0].length % 3,
        //         rupiah = split[0].substr(0, sisa),
        //         ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        //     // tambahkan titik jika yang di input sudah menjadi angka ribuan
        //     if (ribuan) {
        //         separator = sisa ? '.' : '';
        //         rupiah += separator + ribuan.join('.');
        //     }

        //     rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        //     return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        // };
    </script>
@endsection
