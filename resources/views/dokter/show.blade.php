@extends('layouts.main')
@section('dokter','active')
@section('content')

<h1 class="mb-2">Dokter {{ $data->dokter }}</h1>
<p>Riwayat Pemeriksaan</p>

<table class="table table-striped" id="table1">
    <thead>
      <tr>
        <th scope="col">Nama Pasien</th>
        <th scope="col">Keluhan</th>
        <th scope="col">Diagnosa</th>
        <th scope="col">Perwatan</th>
        <th scope="col">Tindakan</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data2 as $item)
        <tr>
            <td>{{ $item->pasien }}</td>
            <td>{{ $item->keluhan }}</td>
            <td>{{ $item->diagnosa }}</td>
            <td>{{ $item->perawatan }}</td>
            <td>{{ $item->tindakan }}</td>
          </tr>
        @endforeach
    </tbody>
  </table>
  @push('datatable')
  <script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script>
  <script>
      // Simple Datatable
      let table1 = document.querySelector('#table1');
      let dataTable = new simpleDatatables.DataTable(table1);
  </script>
  @endpush
@endsection