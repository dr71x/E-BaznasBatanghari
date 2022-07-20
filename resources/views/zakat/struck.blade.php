<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Struck Pembayaran</title>
  </head>
  <body>
    <table width="100%" style="margin-top: 30px">
        <tr>
            <td>
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/soft/assets/img/batanghari.png'))) }}" width="30px" alt="">
            </td>
            <td align="center">
                <h5>Struck Pembayaran</h5>
            </td>
            <td>
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/soft/assets/img/baznas.png'))) }}" width="40px" alt="">
            </td>
        </tr>
    </table>
    <table width="100%" style="margin-top: 100px">
        <tr>
            <td>
                Nama User 
            </td>
            <td>
               : {{ $donasi->donor_name }}
            </td>
        </tr>
        <tr>
            <td>
                Jenis ZIS 
            </td>
            <td>
               : {{ $donasi->donation_type }}
            </td>
        </tr>
        <tr>
            <td>
                E-mail
            </td>
            <td>
                : {{ $donasi->donor_email }}
            </td>
        </tr>
        <tr>
            <td>
                No. Tlp
            </td>
            <td>
                : {{ $donasi->phone }}
            </td>
        </tr>
        <tr>
            <td>
                Tujuan
            </td>
            <td>
                : {{ $donasi->tujuan }} {{ $donasi->namaTujuan }}
            </td>
        </tr>
        <tr>
            <td>
                Tgl. Transaksi
            </td>
            <td>
                : {{ \Carbon\Carbon::parse($donasi->updated_at)->format('d-m-Y') }}
            </td>
        </tr>
        <tr>
            <td>
                Jumlah
            </td>
            <td>
                : Rp. {{ substr($donasi->amount, 0, -3) }}
            </td>
        </tr>
    </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>