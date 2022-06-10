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
                    <form action="{{ url('admin/poli') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama Pasien</label>
                                    <input type="text" value="{{ $data->pasien }}" name="nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="merk">Deskripsi</label>
                                    <input type="text" name="deskripsi" class="form-control">
                                </div>
                                <div class="form-group">
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                    <label for="formFile" class="form-label">Image</label>
                                    <input class="form-control" name="image" type="file" onchange="previewImage()" id="image">
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
