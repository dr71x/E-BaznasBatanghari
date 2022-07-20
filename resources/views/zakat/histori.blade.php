@extends('main.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow" style="padding: 55px;">
                <div class="card-header pb-0">
                    <h5>Histori Donasi</h5>
                </div>
                <div class="card card-body">
                    <div id="loading"></div>
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
                url: '{{ route('historidonasi') }}',
                type: 'GET',
                onLoad: function() {
                    $('#loading').html('<tr><td colspan="5" class="text-center"><i class="fa fa-spinner fa-spin"></i> Memuat Data</td></tr>');
                },
                success: function(data) {
                    $('#tabel').html(data);
                }
            });
        }
    </script>
@endsection
