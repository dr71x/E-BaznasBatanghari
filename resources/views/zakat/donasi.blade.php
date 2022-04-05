@extends('main.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow" style="padding: 55px;">
                <div class="card-header pb-0">
                    <h6>Tabel Donasi</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
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
                url: '{{ route('tabel.donasi') }}',
                type: 'GET',
                success: function(data) {
                    $('#tabel').html(data);
                }
            });
        }
    </script>
@endsection
