@extends('layouts.main')
@section('poli','active')
@section('content')
<div class="page-content">
    <div class="card">
        <div class="card-header">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h5>Edit Data Poli</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                    <form action="{{ url('admin/poli/'.$poli->kode_poli) }}" method="POST" enctype="multipart/form-data">
                        @method("PUT")
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama Poli</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $poli->nama }}">
                                </div>
                                <div class="form-group">
                                    <label for="merk">Deskripsi</label>
                                    <input type="text" name="deskripsi" class="form-control" value="{{ $poli->deskripsi }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Image Poli</label>
                                    <br>
                                    <img id="image" src="{{ asset($poli->image) }}" width="100px" height="75px" class="img-preview img-thumbnail mt-2 mb-4"/>
                                    <input type="file" name="image"  class="form-control" accept="image/*" onchange="previewImage(event)">
                                    {{--     --}}
                                </div>
                                <div class="form-group"><button type="submit" class="btn btn-primary">Edit</button></div>
                            </div>
                        </div>
                    </form>
            </div>
    </div>
</div>
<script>
  var previewImage = function(event) {
    var output = document.getElementById('image');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  </script>

@endsection

