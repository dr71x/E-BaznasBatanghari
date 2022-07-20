<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Laporan {{ $kategori }} BAZNAS</title>
  </head>
  <body>
        <div class="container">
            <table>
                <tr>
                <td width="100px" align="right" rowspan="2">
                        <img src="{{ asset('soft') }}/assets/img/batanghari.png" alt="" width="70px">
                    </td>
                    <td align="center">
                        <h3>Laporan Masuk Donasi {{ $kategori }} BAZNAS Kabupaten Batanghari</h3>
                    </td>
                    <td width="100px" align="left" rowspan="2">
                        <img src="{{ asset('soft') }}/assets/img/baznas.png" alt="" width="90px">
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <p>Periode : {{ $tgl1 }} s/d {{ $tgl2 }}</p>
                    </td>
                </tr>
            </table>
            <hr color="black">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            <span class="text-muted">Transaction ID</span>
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            Nama</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            Email</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            Jenis Zakat</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Donasi</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Tanggal Transaksi</th>    
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($donasi as $item)
                    <tr>
                        <td>
                            {{ $item->transaction_id }}
                        </td>
                        <td>
                            {{ $item->donor_name }}
                        </td>
                        <td>
                            {{ $item->donor_email }}
                        </td>
                        <td>
                            {{ $item->donation_type }}
                        </td>
                        <td width="350px">
                            Rp. {{ Str::substr($item->amount, 0, -3) }}
                        </td>
                        <td align="center">
                            {{ \Carbon\carbon::parse($item->created_at)->translatedFormat('d M Y') }}
                        </td>
                        <td class="align-middle text-center text-sm">
                                <span class="btn btn-outline-success">{{ $item->status }}</span>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="7" align="center">
                                Data Tidak Ada
                            </td>
                        </tr>
                    @endforelse 
                    <tr>
                        <td colspan="6" align="center">
                            <b>Total</b>
                        </td>
                        <td>
                            @if ($total != NULL)
                            Rp . {{ Str::substr($total, 0, -3) }}
                            @else
                            RP. 0
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            window.print();
        });
    </script>
    </body>
</html>