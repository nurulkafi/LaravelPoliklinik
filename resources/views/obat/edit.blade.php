@extends('layouts.main')
@section('obat','active')
@section('content')
<div class="page-content">
    <div class="card">
        <div class="card-header">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h5>Edit Data Obat</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                    <form action="{{ url('admin/obat/'.$obat->id) }}" method="POST">
                        @method("PUT")
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Obat</label>
                                    <input type="text" name="nama" value="{{ $obat->nama }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Merk</label>
                                    <input type="text" name="merk" value="{{ $obat->merk }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Satuan</label>
                                    <input type="text" name="satuan" value="{{ $obat->satuan }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="text" id="rupiah" name="harga" value="{{ $obat->harga_jual }}" class="form-control">
                                </div>
                                <div class="form-group"><button type="submit" class="btn btn-primary">Edit</button></div>
                            </div>
                        </div>
                    </form>
            </div>
    </div>
</div>
<script>
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
    $(document).ready(function(){
        $("#rupiah").val(formatRupiah("{{ $obat->harga_jual }}","Rp. "))
    });
</script>
@endsection

