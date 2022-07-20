<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Laporan {{ $jenis->nama }} BAZNAS</title>
  </head>
  <body>
    <div class="container">
        <table>
            <tr>
            <td width="100px" align="right" rowspan="2">
                    <img src="{{ asset('soft') }}/assets/img/batanghari.png" alt="" width="70px">
                </td>
                <td align="center">
                    <h3>Laporan Pengeluaran Donasi {{ $jenis->nama }} BAZNAS Kabupaten Batanghari</h3>
                </td>
                <td width="100px" align="left" rowspan="2">
                    <img src="{{ asset('soft') }}/assets/img/baznas.png" alt="" width="90px">
                </td>
            </tr>
        </table>
        <hr color="black">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><span
                            class="text-muted">#</span></th>
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        <span class="text-muted">Jenis Pengeluaran</span>
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Keterangan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Tanggal</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Biaya</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengeluaran as $item)
                <tr>
                    <td class="align-middle text-center">
                        {{ $loop->iteration }}
                    </td>
                    <td width="150px">
                        {{ $item->jenis->nama }}
                    </td>
                    <td>
                        {{ $item->ket }}
                    </td>
                    <td>
                        {{ $item->tanggal }}
                    </td>
                    <td>
                        Rp. {{ $item->pengeluaran }}
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
                    <td colspan="4" align="center">
                        Total Pengeluaran
                    </td>
                    <td>
                        Rp. {{ $total }}
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