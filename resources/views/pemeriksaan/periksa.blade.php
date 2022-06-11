@extends('layouts.main')
@section('pemeriksaan','active')
@section('content')
<div class="page-content">
    <div class="card">
        <div class="card-header">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h5>Pemeriksaan Pasien</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                    <form action="{{ url('admin/pemeriksaan/'.$id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method("PUT")
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-5">
                                        <label for="nama">Nama Pasien</label>
                                        <input type="text" id="no_pasien" disabled value="{{ $data->pasien }}" name="no_pasien" class="form-control" placeholder="Masukan No Pasien">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="nama">Usia</label>
                                        <input type="text" id="usia" disabled value="{{ $umur." Tahun" }}" name="no_pasien" class="form-control disable" placeholder="Masukan No Pasien">
                                    </div>
                                </div>
                                <div class="float-start mb-2">
                                    <span class="badge  bg-info">Riwayat Pemeriksaan Pasien</span>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Keluhan</th>
                                            <th>Diagnosa</th>
                                            <th>Perawatan</th>
                                            <th>Tindakan</th>
                                            <th>Tensi Darah</th>
                                            <th>Berat Badan</th>
                                            <th>Tanggal Pemeriksaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($data2 as $items)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $items->keluhan }}</td>
                                                <td>{{ $items->diagnosa }}</td>
                                                <td>{{ $items->perawatan }}</td>
                                                <td>{{ $items->tindakan }}</td>
                                                <td>{{ $items->tensi_darah }}</td>
                                                <td>{{ $items->berat_badan }}</td>
                                                <td>{{ $items->tgl_pendaftaran }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="nama">Berat Badan</label>
                                        <input type="text" id="bb"  name="bb" class="form-control" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nama">Tensi Darah</label>
                                        <input type="text" id="tensi_darah"  name="tensi_darah" class="form-control disable" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="merk">Keluhan</label>
                                    <textarea type="text" name="keluhan" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="merk">Diagnosa</label>
                                    <textarea type="text" name="diagnosa" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="merk">Perawatan</label>
                                    <textarea type="text" name="perawatan" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="merk">Tindakan</label>
                                    <textarea type="text" name="tindakan" class="form-control"></textarea>
                                </div>
                                <div class="form-group"><button type="submit" class="btn btn-primary">Tambah</button></div>
                            </div>
                            <div class="col-md-6">
                                
                                <div class="float-start">
                                    <span class="badge bg-info">Jenis Tindakan Pemeriksaan</span>
                                </div>
                                <div class="float-end mb-2">
                                    <button type="button" class="btn btn-sm btn-primary rounded-pill" data-bs-toggle="modal"
                                                data-bs-target="#large">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                                <table id="t_tindakan" class="table table-striped">
                                    <thead>
                                        <tr>
                                            {{-- <th>No</th> --}}
                                            <th>Tindakan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <div class="float-start">
                                    <span class="badge bg-info">Resep</span>
                                </div>
                                <div class="float-end mb-2">
                                    <button type="button" class="btn btn-sm btn-primary rounded-pill" data-bs-toggle="modal"
                                                data-bs-target="#large2">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                                <table id="t_obat" class="table table-striped">
                                    <thead>
                                        <tr>
                                            {{-- <th>No</th> --}}
                                            <th>Tindakan</th>
                                            <th>Dosis</th>
                                            <th>Jumlah</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
            </div>
    </div>
</div>
<div class="modal fade text-left" id="large" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Data Tindakan</h4>
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
                            <th>Nama Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($jb as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block pilih_tindakan" id="pilih_tindakan">Pilih</span>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade text-left" id="large2" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Data Obat</h4>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="table2" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No Obat</th>
                            <th>Nama Obat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($obat as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block pilih_obat" id="pilih_obat">Pilih</span>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
    let table2 = document.querySelector('#table2');
    let dataTable2 = new simpleDatatables.DataTable(table2);
    let no = 0;

    $("#table1").on('click', '.pilih_tindakan', function() {
      // get the current row
        var currentRow = $(this).closest("tr");

        var col1 = currentRow.find("td:eq(0)").html(); // get current row 1st table cell TD value
        var col2 = currentRow.find("td:eq(1)").html(); // get current row 2nd table cell TD value

        html = "<tr>";
        html += "<input type='hidden' name='jenis_biaya[]' value='"+ col1 +"'>";
        html += "<td>"+ col2 +"</td>";
        html += "<td><button type='button' class='btn btn-sm btn-danger btn-hapus-tindakan'><i class='bi bi-trash'></i></button></td>"
        html += "</tr>";

      $("#t_tindakan > tbody").append(html);
      no = no+1;
    });
    $("#table2").on('click', '.pilih_obat', function() {
      // get the current row
        var currentRow = $(this).closest("tr");

        var col1 = currentRow.find("td:eq(0)").html(); // get current row 1st table cell TD value
        var col2 = currentRow.find("td:eq(1)").html(); // get current row 2nd table cell TD value

        html = "<tr>";
        html += "<input type='hidden' name='id_obat[]' value='"+ col1 +"'>";
        html += "<td>"+ col2 +"</td>";
        html += "<td><input class='form-control' name='dosis[]'></td>";
        html += "<td><input class='form-control' name='jumlah[]'></td>";
        html += "<td><button type='button' class='btn btn-sm btn-danger btn-hapus-obat'><i class='bi bi-trash'></i></button></td>"
        html += "</tr>";

      $("#t_obat > tbody").append(html);
      no = no+1;
    });
    $("#t_tindakan").on("click", ".btn-hapus-tindakan", function() {
        $(this).closest("tr").remove();
    });
    $("#t_obat").on("click", ".btn-hapus-obat", function() {
        $(this).closest("tr").remove();
    });
</script>
@endpush
@endsection
