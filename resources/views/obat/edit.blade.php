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
                                    <input type="text" name="harga" value="{{ $obat->harga_jual }}" class="form-control">
                                </div>
                                <div class="form-group"><button type="submit" class="btn btn-primary">Edit</button></div>
                            </div>
                        </div>
                    </form>
            </div>
    </div>
</div>
@endsection

