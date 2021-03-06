@extends('layouts.main');
@section('Users','active')
@section('content')
    @error('categories')
    <div class="alert alert-danger alert-dismissible fade show">
        <i class="bi bi-file-excel"></i>{{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
    @enderror
    <section id="input-style">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Input Role</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('admin/users/'.$user->id) }}" >
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Name</label>
                                        <input type="text" id="" name="name" class="form-control round" placeholder="Name" value="{{ $user->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Email</label>
                                        <input type="email" id="" name="email" class="form-control round" placeholder="Email" value="{{ $user->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Password</label>
                                        <input type="password" id="" name="password" class="form-control round">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Confirm Password</label>
                                        <input type="password" id="" name="confirm-password" class="form-control round">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Role</label>
                                        <select name="role" id="" class="form-select">
                                            {{-- <option value="{{ $userRole->id }}">{{ $userRole->name }}</option> --}}
                                            @foreach ($roles as $item)
                                                {{-- @if ($item->id != $userRole->id) --}}
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                {{-- @endif --}}
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
