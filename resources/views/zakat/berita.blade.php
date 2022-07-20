@extends('main.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow" style="padding: 55px;">
                <div class="header pb-0">
                    <h6 id="label">Tabel Berita BAZNAS</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <button class="btn btn-primary" id="tambah">Tambah</button>
                    <button class="btn btn-primary" id="batal" style="display: none">Batal</button>
                    <div id="form-tambah" style="display: none"></div>
                    <div class="table-responsive p-0" id="tabel">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <td>
                                        No
                                    </td>
                                    <td>
                                        Tipe Berita
                                    </td>
                                    <td>
                                        Judul
                                    </td>
                                    <td>
                                        Image
                                    </td>
                                    <td>
                                        Action
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($berita as $item)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $item->tipe->nama }}
                                        </td>
                                        <td>
                                            {{ $item->judul }}
                                        </td>
                                        <td>
                                            <img src="data:image/{{ $item->type }};base64,{{ $item->gambar }}" width="60px" alt="">
                                        </td>
                                        <td>
                                            <a data-link="{{ route('hapusberita',$item->id) }}" data-id="{{ $item->id }}" class="hapus btn btn-danger" id="hapus">Hapus</a>
                                            <a data-id="{{ $item->id }}" class="edit btn btn-info" >Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
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

        $('.edit').click(function(){
            $("#form-tambah").slideDown("fast");
            $("#tabel").slideUp("fast");
            $("#tambah").hide();
            $("#batal").show();
            $("#label").html("Form Edit");
            var id = $(this).data('id');
            $.ajax({
                url: "{{ url('/berita/edit') }}/"+id,
                type: "GET",
                success: function(data) {
                    $("#form-tambah").html(data);
                }
            });
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
            url: "{{ url('/zakat/berita/tambah') }}",
            method: "GET",
            success: function(data) {
                $("#form-tambah").html(data);
            }
        });
    }
</script>
@endsection
