@extends('main.layout')
@section('content')
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Donasi Succes</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ Str::substr($zakat, 0, -3) }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Success</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $success}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Pending</p>
                                <h5 class="font-weight-bolder mb-0">
                                   {{ $pending }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Gagal</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $expired }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-4">
            <div class="card card-body  p-3">
                <div id="chart"></div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
  
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Donasi'
    },
    xAxis: {
        categories: {!! json_encode($bulan) !!},
    },
    yAxis: {
        title: {
            text: 'Total'
        },
        labels: {
            formatter: function () {
                return  'Rp. ' + this.value;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Zakat',
        marker: {
            symbol: 'square'
        },
        data: {!! json_encode($total) !!},
    },
    {
        name: 'Infak',
        marker: {
            symbol: 'square'
        },
        data: {!! json_encode($total1) !!},
    },
    {
        name: 'Sedekah',
        marker: {
            symbol: 'square'
        },
        data: {!! json_encode($total2) !!},
    }]
});
 @if (session('success'))
    Swal.fire({
      icon: 'success',
      title: 'Login Berhasil',
      text: '{{ session('success') }}'
    });
 @endif
</script>
@endsection