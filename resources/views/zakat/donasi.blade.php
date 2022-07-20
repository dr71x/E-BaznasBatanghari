@extends('main.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow" style="padding: 55px;">
                <div class="card-header pb-0">
                    <h6>Donasi Zakat</h6>
                </div>
                <div class="card card-body mb-5">
                    <form action="{{ route('cetak') }}" method="post">
                        @csrf
                        <input type="hidden" name="kategoriid" value="1">
                        <div class="row justify-content-end">
                            <div class="col-md-4">
                                <input type="date" name="tgl1" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <input type="date" name="tgl2" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-success">Cetak</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Tipe Zakat</label>
                            </div>
                            <div class="col-md-4">
                                <select name="tipe" id="tipe" class="form-control">
                                    <option value="">Pilih Tipe</option>
                                    @foreach ($tipe as $item)
                                        <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="tabel">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            setInterval(function () {
                var tipe = $('#tipe').val();
                $.ajax({
                    url: '{{ route('detail.donasi') }}',
                    type: 'POST',
                    data: {
                        tipe: tipe,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data){
                        $('#tabel').html(data);
                    }
                });
            }, 5000);
            $('#tipe').change(function(){
            var tipe = $('#tipe').val();
            $.ajax({
                url: '{{ route('detail.donasi') }}',
                type: 'POST',
                data: {
                    tipe: tipe,
                    _token: '{{ csrf_token() }}'
                },
                beforeSend: function(){
                    $('#tabel').html('<tr><td colspan="5" class="text-center"><i class="fa fa-spinner fa-spin"></i>  Tunggu Sebentar ya &#128513;</td></tr>');
                },
                success: function(data){
                    $('#tabel').html(data);
                }
            });
        });
        });
    </script>
@endsection
