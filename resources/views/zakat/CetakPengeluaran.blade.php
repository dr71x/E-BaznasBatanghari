@extends('main.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow" style="padding: 55px;">
                <div class="header pb-0 mb-4">
                    <h5> <label>Form Cetak Pengeluaran</label> </h5>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <form action="{{ route('donasikeluarcetakdetail') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Pilih Kategori</label>
                                </div>
                                <div class="col-md-6">
                                    <select name="kategori" class="form-control">
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Pilih Bulan</label>
                                </div>
                                <div class="col-md-6">
                                    <select name="bulan" class="form-control">
                                        @foreach ($bulan as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Tahun</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="tahun" class="form-control" data-mask="9999">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary float-end" type="submit">Cetak</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection