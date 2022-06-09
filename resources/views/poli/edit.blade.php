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
                                    <label for="formFile" class="form-label">Image</label>
                                    <input type="hidden" name="oldImage" value="{{ $poli->image }}">
                                    @if ($poli->image)
                                    <img src="{{ asset('storage/' . $poli->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                    @else
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                    @endif
                                    <input class="form-control" name="image" type="file" id="image" onchange="previewImage()">
                                </div>
                                <div class="form-group"><button type="submit" class="btn btn-primary">Tambah</button></div>
                            </div>
                        </div>
                    </form>
            </div>
    </div>
</div>
<script>
    function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
      }
    }
  </script>

@endsection

