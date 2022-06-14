@extends('layouts.main')
@section('media_pembayaran','active')
@section('content')
<div class="page-content">
    <div class="card">
        <div class="card-header">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h5>Edit Data Media Pembayaran</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                    <form action="{{ url('admin/media_pembayaran/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method("PUT")
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama Bank</label>
                                    <input type="text" value="{{ $data->nama_bank }}" name="nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="merk">No Rekening</label>
                                    <input type="text" value="{{ $data->no_rekening }}" name="norek" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="satuan">Atas Nama</label>
                                    <input type="text" value="{{ $data->atas_nama }}" name="atas_nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Logo Bank</label>
                                    <br>
                                    <img id="output" src="{{ asset($data->logo) }}" width="100px" height="75px" class="img-thumbnail mt-2 mb-4"/>
                                    <input type="file" name="image"  class="form-control" accept="image/*" onchange="loadFile(event)">
                                    {{--     --}}
                                </div>
                                <div class="form-group"><button type="submit" class="btn btn-primary">Simpan</button></div>
                            </div>
                        </div>
                    </form>
            </div>
    </div>
</div>
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

