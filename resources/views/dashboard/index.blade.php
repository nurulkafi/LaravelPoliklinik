@extends('layouts.main')
@section('Dashboard','active')
@section('content')
ini adalah halaman dashboard
    @push('dashboard')
        <script src="{{ asset('admin/assets/js/pages/dashboard.js')}}"></script>
   @endpush
@endsection
