@extends('layouts.main')
@section('dokter','active')
@section('content')
<div class="page-content">
    <div class="card">
        <div class="card-header">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h5>Tambah Data Dokter</h5>
                    </div>
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h5>Data Akun Untuk Login</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                    <form action="{{ url('admin/dokter') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Dokter</label>
                                    <input type="text" name="nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="poli" class="form-label">Poliklinik</label>
                                    <select class="form-select text-center" name="poli">
                                        @foreach($poli as $p)
                                        @if(old('poli') == $p->kode_poli)
                                        <option value="{{ $p->kode_poli }}" selected>{{ $p->nama }}</option>   
                                        @else
                                        <option value="{{ $p->kode_poli }}">{{ $p->nama }}</option>
                                        @endif
                                        @endforeach
                                      </select>
                                </div>
                                <div class="form-group">
                                    <label for="">No Hp</label>
                                    <input type="text" name="no_hp" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk" value="laki-laki"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Laki - Laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk" value="perempuan"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                        Perempuan
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea  name="alamat" class="form-control" id=""></textarea>
                                </div>
                                <div class="form-group"><button type="submit" class="btn btn-primary">Tambah</button></div>
                            </div>
                            <div class="col-md-6">
                                
                                <div class="form-gruop">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" id="">
                                </div>
                                <div class="form-gruop">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
    </div>
</div>
@endsection

