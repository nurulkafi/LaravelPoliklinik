@extends('layouts.main')
@section('Role','active')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h5>Data Roles</h5>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <a class="btn btn-primary float-start float-lg-end" href="{{ url('admin/role/create') }}">
                    Tambah Role
                </a>
            </div>
        </div>
    </div>
    <div class="card-content">
        <div class="card-body">
            <table id="table1" class="table table-striped">
                <tr>
                    <td>No</td>
                    <td>Name</td>
                    <td>Action</td>
                </tr>
                @foreach ($role as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ url('admin/role/'.$item->id.'/edit') }}" class="btn btn-sm btn-info">Edit</a>
                        <button class="btn btn-sm btn-danger hapusData"  type="button" data-bs-toggle="modal" data-bs-target="#primary" data-id="{{ $item->id }}">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
{{-- modal --}}
<div class="modal fade text-left" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160"aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger" id="modalheader">
                <h5 class="modal-title white" id="myModalLabel160">
                    Hapus Data Pasien
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
@endsection
@push('datatable')
<script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
    $(document).ready(function() {
        $('.hapusData').on('click',function () {
            const id = $(this).data('id');
            $('#form').attr('action','role/'+id);
        });
    });
</script>
@endpush
