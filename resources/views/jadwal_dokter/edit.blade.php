@extends('layouts.main')
@section('jadwal_dokter','active')
@section('content')
<div class="page-content">
    <div class="card">
        <div class="card-header">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h5>Edit Data Jadwal Dokter</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                    <form action="{{ url('admin/jadwal_dokter/'.$jadwal_dokter->id) }}" method="POST">
                        @method("PUT")
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Hari</label>
                                    <input type="text" name="hari" class="form-control" value="{{ $jadwal_dokter->hari }}">
                                </div>
                                <div class="form-group">
                                    <label for="dokter" class="form-label">Nama Dokter</label>
                                    <select class="form-select text-center" name="dokter">
                                        @foreach($dokter as $d)
                                        @if(old('dokter',$jadwal_dokter->dokter_id) == $d->id)
                                        <option value="{{ $d->id }}" selected>{{ $d->nama }}</option>   
                                        @else
                                        <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                        @endif
                                        @endforeach
                                      </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Jam Mulai</label>
                                    <input type="time" name="jam_mulai" class="form-control" value="{{ $jadwal_dokter->jam_mulai }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Jam Selesai</label>
                                    <input type="time" name="jam_selesai" class="form-control" id="" value="{{ $jadwal_dokter->jam_selesai }}">
                                </div>
                                <div class="form-group"><button type="submit" class="btn btn-primary">Edit</button></div>
                            </div>
                        </div>
                    </form>
            </div>
    </div>
</div>
@endsection

