@extends('main.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow" style="padding: 55px;">
                <div class="card-header pb-0">
                    <h6>Donasi Zakat</h6>
                </div>
                <div class="card card-body">
                    <div class="col-md-4 mb-4">
                        <a href="" class="btn btn-success">Cetak</a>
                    </div>
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="tabel">
                            <thead>
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Jenis Pengeluaran
                                    </th>
                                    <th>
                                        Keterangan
                                    </th>
                                    <th>
                                        Tanggal
                                    </th>
                                    <th>
                                        Amount
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
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
                                            {{ \Carbon\carbon::parse($item->tanggal)->translatedFormat('d-M-Y') }}
                                        </td>
                                        <td>
                                            Rp. {{ $item->pengeluaran }}
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