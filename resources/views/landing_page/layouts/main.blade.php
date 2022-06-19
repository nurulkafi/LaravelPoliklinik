<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kadazi Klinik</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('landing_pages/vendors/owl-carousel/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('landing_pages/vendors/owl-carousel/css/owl.theme.default.css') }}">
  <link rel="stylesheet" href="{{ asset('landing_pages/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('landing_pages/vendors/aos/css/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('landing_pages/css/style.min.css') }}">
</head>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
@include('landing_page.partials.navbar')
<div class="content-wrapper">
    <div class="container">
        @yield('content')
    @include('landing_page.partials.footer')
    </div>
</div>
<script src="{{ asset('landing_pages/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('landing_pages/vendors/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('landing_pages/vendors/owl-carousel/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('landing_pages/vendors/aos/js/aos.js') }}"></script>
<script src="{{ asset('landing_pages/js/landingpage.js') }}"></script>
</body>