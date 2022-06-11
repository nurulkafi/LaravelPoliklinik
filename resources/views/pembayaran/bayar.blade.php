@extends('layouts.main')
@section('pembayaran','active')
@section('content')
<div class="page-content">
    <div class="card">
        <div class="card-header">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h5>Tambah Data Obat</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table id="table1" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Obat</th>
                                                    <th>Harga Obat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($harga_obat as $item)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $item->obat }}</td>
                                                    <td>{{ $item->harga }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table id="table1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Biaya</th>
                                                <th>Biaya Pemeriksaan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($jenis_biaya as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->jenis_biaya }}</td>
                                                <td>{{ $item->tarif }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            <div class="col-md-6">
                                <form action="{{ url('admin/pembayaran/'.$id) }}" method="post">
                                    @method("PUT")
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="nama">Total Bayar</label>
                                    <input type="text" disabled name="total_bayar" class="form-control" value="{{ $hasil }}">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Bayar</label>
                                    <input type="text" name="bayar" class="form-control bayar">
                                </div>
                                <div class="form-group"><button type="submit" class="btn btn-primary">Bayar</button></div>
                                </form>
                            </div>
                        </div>
                    </form>
    </div>
</div>

<script>
        let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
    var rupiah = document.getElementById("rupiah");
    rupiah.addEventListener("keyup", function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value, "Rp. ");
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
    $(document).ready(function() {
       $('.bayar').keypress(function(){
            console.log(this.value);
        });
    });
</script>
@endsection
