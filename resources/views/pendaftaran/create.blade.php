@extends('layouts.main')
@section('pendaftaran','active')
@section('content')
<div class="page-content">
    <div class="card">
        <div class="card-header">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h5>Tambah Pendaftaran</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                    <form action="{{ url('admin/pendaftaran') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-10">
                                        <label for="nama">No Pasien</label>
                                        <input type="text" id="no_pasien" name="no_pasien" class="form-control" placeholder="Masukan No Pasien">
                                        {{-- <p><small class="text-muted">Masukan No Pasien Lalu Enter, Atau Bisa Dicari Berdasarkan nama pasien</small> --}}
                                        </p>
                                    </div>
                                    <div class="form-group col-md-2 mt-4">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#large">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Dokter</label>
                                    <select name="jadwal_dokter" class="choices form-select">
                                        @foreach ($data as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }} | {{ $item->poli }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"><button type="submit" class="btn btn-primary">Tambah</button></div>
                            </div>
                        </div>
                    </form>
            </div>
    </div>
</div>
<!--large size Modal -->
    <div class="modal fade text-left" id="large" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Data Pasien</h4>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="table1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No Pasien</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($pasien as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->tgl_lahir }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block pilih_pasien" id="pilih_pasien">Pilih</span>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1"
                        data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Accept</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('datatable')
<script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);

    $("#table1").on('click', '.pilih_pasien', function() {
      // get the current row
      var currentRow = $(this).closest("tr");

      var col1 = currentRow.find("td:eq(0)").html(); // get current row 1st table cell TD value
      var col2 = currentRow.find("td:eq(1)").html(); // get current row 2nd table cell TD value
      var col3 = currentRow.find("td:eq(2)").html(); // get current row 3rd table cell  TD value
      var data = col1;

      $("#no_pasien").addClass("is-valid");
      $("#no_pasien").val(data);
      console.log(data);
    });
</script>
@endpush
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
@endsection

