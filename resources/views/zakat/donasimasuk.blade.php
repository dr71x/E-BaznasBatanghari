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
                                        Nama Donatur
                                    </th>
                                    <th>
                                        Email Donatur
                                    </th>
                                    <th>
                                        Tanggal Donasi
                                    </th>
                                    <th>
                                        Amount
                                    </th>
                                    <th>
                                        Status
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
                                            {{ $item->donor_name }}
                                        </td>
                                        <td>
                                            {{ $item->donor_email }}
                                        </td>
                                        <td>
                                            {{  \Carbon\carbon::parse($item->created_at)->format('d-m-Y') }}
                                        </td>
                                        <td>
                                            {{ Str::substr($item->amount, 0, -3) }}
                                        </td>
                                        <td>
                                            {{ $item->status }}
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