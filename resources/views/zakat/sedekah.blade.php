@extends('main.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow" style="padding: 55px;">
                <div class="card-header pb-0">
                    <h6>Donasi Sedekah</h6>
                </div>
                <div class="card card-body mb-5">
                    <form action="{{ route('cetaksedekah') }}" method="post">
                        @csrf
                        <input type="hidden" name="kategoriid" value="3">
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
        $(document).ready(function() {
            getTabel();
            reloadtabelinterval();
        });

        function reloadtabelinterval() {
            setTimeout(function() {
                getTabel();
                reloadtabelinterval();
            }, 3000);
        }

        function getTabel() {
            $.ajax({
                url: '{{ route('tabel.donasi.sedekah') }}',
                type: 'GET',
                success: function(data) {
                    $('#tabel').html(data);
                }
            });
        }
    </script>
@endsection
