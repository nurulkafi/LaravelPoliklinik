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
                                <form action="{{ url('admin/pembayaran/'.$id) }}" method="post">
                                    @method("PUT")
                                    {{ csrf_field() }}
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Total Bayar</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                                            <input type="text" disabled name="total_bayar" id="rupiah" class="form-control">

                                        </div>
                                    </div>
                                    @if ($data->status == "Lunas" || $data->status == "Menunggu Verifikasi Pembayaran")
                                    <div class="form-group">
                                        <label for="harga">Bayar</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                                            <input type="text" name="lunas" disabled class="form-control" id="lunas">
                                            <input type="hidden" name="bayar" class="form-control" id="bayar">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        @if ($data->status == "Menunggu Verifikasi Pembayaran"){
                                            <button type="submit" class="btn btn-primary">Verifikasi</button>
                                        }
                                        @else
                                            <a href="{{ url('admin/pembayaran') }}" class="btn btn-primary mt-2">Kembali</a>
                                        @endif
                                    </div>
                                </div>
                                @if ($data->status == "Menunggu Verifikasi Pembayaran")
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Bukti Pembayaran</label><br>
                                        <img src="" alt="" class="img-thumbnail">
                                    </div>
                                </div>
                                @endif
                                </div>
                                @else
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="harga">Bayar</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                        <input type="text" name="bayar" class="form-control" id="bayar">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" id="btn_bayar">Bayar</button>
                                </div>
                                </div>
                                @endif
                                </form>
                        </div>
                    </form>
    </div>
</div>

<script>
    var rupiah = document.getElementById("rupiah");
    rupiah.addEventListener("keyup", function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value);
    });
    var bayar = document.getElementById("bayar");
    bayar.addEventListener("keyup", function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatbayar() untuk mengubah angka yang di ketik menjadi format angka
    bayar.value = formatRupiah(this.value);
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
       sisa 	= number_string.length % 3,
	rupiah 	= number_string.substr(0, sisa),
	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    return rupiah;
    }
    $(document).ready(function(){
        $("#btn_bayar").prop('disabled',true);
        $("#rupiah").val(formatRupiah("{{ $hasil }}"));
        $("#lunas").val(formatRupiah("{{ $hasil }}"));
        $("#bayar").keyup(function(){
            $("#bayar").val(formatRupiah(this.value));
            bayar = this.value.replace( /[^0-9]/, '');
            console.log(parseInt(bayar));
            if (parseInt(bayar) >= parseInt("{{ $hasil }}")) {
                $("#btn_bayar").prop('disabled',false);
            }else{
                $("#btn_bayar").prop('disabled',true);
            }
        });
    });

</script>
@endsection
