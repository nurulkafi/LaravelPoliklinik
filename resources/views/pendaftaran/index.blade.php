@extends('layouts.main')
@section('pendaftaran','active')
@section('content')
<div class="page-content">
    <div class="card">
        <div class="card-header">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h5>Data Pendaftaran</h5>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <a class="btn btn-primary float-start float-lg-end" href="{{ url('admin/pendaftaran/create') }}">
                            Tambah Pendaftaran
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="table1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Nama Dokter</th>
                            <th>Nama Poli</th>
                            <th>Tanggal Pendaftaran</th>
                            <th>No Antrian</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->pasien }}</td>
                            <td>{{ $item->dokter }}</td>
                            <td>{{ $item->poli }}</td>
                            <td>{{ $item->tgl_pendaftaran }}</td>
                            <td>{{ $item->no_antrian }}</td>
                            <td><span class="badge rounded-pill bg-info">
                                {{ $item->status }}</span></td>
                            <td>
                                <button class="btn btn-danger btn-sm hapusData"  type="button" data-bs-toggle="modal" data-bs-target="#primary" data-id="{{ $item->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</div>
{{-- Modal Form --}}
<div class="modal fade text-left" id="primary" tabindex="-1"role="dialog" aria-labelledby="myModalLabel160"aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger" id="modalheader">
                <h5 class="modal-title white" id="myModalLabel160">
                    Hapus Pendaftaran
                </h5>
                <button type="button" class="close"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
            </button>
        </div>
        <form method="POST" id="form">
        @csrf
        @method('DELETE')
        <div id="method">

        </div>
        <div class="modal-body" id="modalform">
            Apakah Yakin Akan Menghapus Data?
        </div>
        <div class="modal-footer">
            <button type="button" id="closeBTN"
                class="btn btn-light-secondary"
                data-bs-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Close</span>
            </button>
            <button type="submit" class="btn btn-primary ml-1" id="submit">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Yes</span>
            </button>
        </div>
        </form>
    </div>
</div>
@push('datatable')
<script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
    $(document).ready(function() {
        $('.hapusData').on('click',function () {
            const id = $(this).data('id');
            $('#form').attr('action','pendaftaran/'+id);
        });
    });
</script>
@endpush
@endsection

