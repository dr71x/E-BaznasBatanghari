@extends('main.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow" style="padding: 55px;">
                
                <div class="header pb-0">
                    <h6 id="label">Tabel Pengeluaran Zakat</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    @if (\Auth::user()->level == 'admin')
                   <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-primary mb-4" id="tambah">Tambah</button>
                            <button class="btn btn-primary" id="batal" style="display: none">Batal</button>
                            
                        </div>
                        <div class="col-md-6">
                                <form action="{{ route('cetaksemua') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $pengeluaranid->kategoriid ?? '' }}">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="date" class="form-control" name="dari" id="dari">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <h5>sampai</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="date" class="form-control" name="sampai" id="sampai">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Cetak</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                    <div id="form-tambah" style="display: none"></div>
                   </div>
                    @endif
                    <div class="table-responsive p-0" id="tabel">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <td>
                                        No
                                    </td>
                                    <td>
                                        Jenis Pengeluaran
                                    </td>
                                    <td>
                                        Keterangan
                                    </td>
                                    <td>
                                        Tanggal
                                    </td>
                                    <td>
                                        biaya
                                    </td>
                                    <td>
                                        Action
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pengeluaran as $item)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $item->jenis->nama }}
                                        </td>
                                        <td>
                                            {{ $item->ket }}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}
                                        </td>
                                        <td>
                                            Rp. {{ $item->pengeluaran }}
                                        </td>
                                        <td>
                                            <a data-link="{{ route('hapuspengeluaranzakat',['id' => $item->id]) }}" class="hapus btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" align="center">
                                            Tidak ada data
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $("#tambah").click(function() {
           $("#form-tambah").slideDown("fast");
           $("#tabel").slideUp("fast");
           $("#tambah").hide();
           $("#batal").show();
           tambahform();
           $("#label").html("Form Tambah");
        });


        $("#batal").click(function() {
           $("#form-tambah").slideUp("fast");
           $("#tabel").slideDown("fast");
           $("#tambah").show();
           $("#batal").hide();
           $("#label").html("Tabel Donasi");
        });

        $(".hapus").click(function(){
            var id = $(this).attr("data-id");
            var link = $(this).attr("data-link");
            Swal.fire({
            title: 'Apa Kamu Yakin?',
            text: "Kamu Tidak Akan Dapat Mengembalikan Ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = link;
                }
            })
        })
    });

    // function edit($id){
    //     $.ajax({
    //         url: "{{ url('/') }}/zakat/berita/edit/"+$id,
    //         type: "GET",
    //         dataType: "JSON",
    //         success: function(data){
    //             $("#form-tambah").slideDown("fast");
    //             $("#tabel").slideUp("fast");
    //             $("#tambah").hide();
    //             $("#batal").show();
    //             $("#form-tambah").html(data);
    //             $("#label").html("Form Edit");
    //         }
    //     });
    // }

    function tambahform(){
        $.ajax({
            url: "{{ url('/donasi/keluar/zakat/form') }}",
            method: "GET",
            success: function(data) {
                $("#form-tambah").html(data);
            }
        });
    }
</script>
@endsection
