@extends('layouts.main')
@section('pegawai','active')
@section('content')
<div class="page-content">
    <div class="card">
        <div class="card-header">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h5>Edit Data Pegawai</h5>
                    </div>
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h5>Data Akun Untuk Login</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                    <form action="{{ url('admin/pegawai/'.$pegawai->id) }}" method="POST">
                        @method("PUT")
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Pegawai</label>
                                    <input type="text" name="nama" value="{{ $pegawai->nama }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea  name="alamat" class="form-control" id="">{{ $pegawai->alamat }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">No Hp</label>
                                    <input type="text" name="no_hp" value="{{ $pegawai->no_hp }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" class="form-control" id="" value="{{ $pegawai->tgl_lahir }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    @if ($pegawai->jenis_kelamin == "laki-laki")
                                    <div class="form-check">
                                        <input class="form-check-input" checked type="radio" name="jk" value="laki-laki"
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
                                    @else
                                    <div class="form-check">
                                        <input class="form-check-input"  type="radio" name="jk" value="laki-laki"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Laki - Laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" checked type="radio" name="jk" value="perempuan"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                        Perempuan
                                        </label>
                                    </div>
                                    @endif

                                </div>
                                <div class="form-group"><button type="submit" class="btn btn-primary">Edit</button></div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-gruop">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" id="" value="{{ $user->email }}">
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

