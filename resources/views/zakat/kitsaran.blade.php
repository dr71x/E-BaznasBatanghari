@extends('main.layout')
@section('content')
<div class="col-12">
    <div class="card mb-4 shadow" style="padding: 55px;">
        <div class="header pb-0">
            <h5 id="label"><b>Kritik Dan Saran</b></h5>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0" id="tabel">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <td>
                                No
                            </td>
                            <td>
                                Nama
                            </td>
                            <td>
                                Email
                            </td>
                            <td>
                                Tentang
                            </td>
                            <td>
                                Telepon
                            </td>
                            <td>
                                Action
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                       @forelse ($data as $item)
                           <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $item->nama }}
                            </td>
                            <td>
                                {{ $item->email }}
                            </td>
                            <td>
                                {{ $item->tentang }}
                            </td>
                            <td>
                                {{ $item->telepon }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                    <i class="fas fa-search"></i>
                                  </button>
                            </td>
                           </tr>
                           <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <h5>Pesan</h5>
                                    <p>{!! $item->pesan !!}</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                       @empty
                           <tr>
                            <td colspan="6">
                                <h6>Tidak ada data</h6>
                            </td>
                           </tr>
                       @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection