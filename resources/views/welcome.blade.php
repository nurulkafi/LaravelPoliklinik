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
  <header id="header-section">
    <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
    <div class="container">
      <div class="navbar-brand-wrapper d-flex w-100">
        <img src="{{ asset('images/logo/logo2.png') }}" width="50%" alt="">
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="mdi mdi-menu navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
        <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
          <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
            <div class="navbar-collapse-logo">
              <img src="images/Group2.svg" alt="">
            </div>
            <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
            </button>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#header-section">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#features-section">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Aplikasi">Aplikasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#tim">Tim</a>
          </li>
          <li class="nav-item btn-contact-us pl-4 pl-lg-0">
            <a class="btn btn-info" href="{{ url('login') }}">Login</a>
          </li>
        </ul>
      </div>
    </div>
    </nav>
  </header>
  <div class="banner" >
    <div class="container">
      <h1 class="font-weight-semibold">Kadazi Klinik</h1>
      <h6 class="font-weight-normal text-muted pb-3">Kadazi Adalah Singkatan Kafi , Daffa , Dan Zikri Ini Merupakan Klinik Yang Ada Di Konoha</h6>
      <div>
        <button class="btn btn-opacity-light mr-1">Get started</button>
        <button class="btn btn-opacity-success ml-1">Learn more</button>
      </div>
      <img src="{{ asset('landing_pages/images/landing.svg') }}" width="50%" alt="" class="img-fluid mt-4">
    </div>
  </div>
  <div class="content-wrapper">
    <div class="container">
      <section class="features-overview" id="features-section" >
        <div class="content-header">
          <h2>About</h2>
          <h6 class="section-subtitle text-muted">Aplikasi & Website</h6>
        </div>
        <div class="d-md-flex justify-content-between">
          <div class="grid-margin d-flex justify-content-start">
            <div class="features-width">
              <img src="{{ asset('landing_pages/images/Group12.svg') }}" alt="" class="img-icons">
              <h5 class="py-3">Tujuan</h5>
              <p class="text-muted">
                Ini Merupakan Aplikasi Yang Bertujuan Untuk Memenuhi Tugas Besar Pemograman Mobile
                Semester 6 Universitas Jenderal Achmad Yani
              </p>
            </div>
          </div>
          <div class="grid-margin d-flex justify-content-center">
            <div class="features-width">
              <img src="{{ asset('landing_pages/images/Group7.svg') }}" alt="" class="img-icons">
              <h5 class="py-3">Alur Aplikasi</h5>
              <p class="text-muted">
                Aplikasi Atau Sistem Informasi Klinik Mempunyai Aplikasi Mobile Yang Fungsi Untuk Pasien Mendaftar secara online,
                Dan Ada Website Yang Digunakan untuk dokter dan pegawai untuk mengelola data data pasien , seperti pemeriksaan , pembayaran dan lain - lain.
              </p>
            </div>
          </div>
          <div class="grid-margin d-flex justify-content-end">
            <div class="features-width">
              <img src="{{ asset('landing_pages/images/Group5.svg') }}" alt="" class="img-icons">
              <h5 class="py-3">Menghubungkan Web Dan Mobile</h5>
              <p class="text-muted">
                Untuk Menghubungkan Web Dan Mobile itu sendiri kita menggunakan web services / api
                dan menggunakan laravel sebagai bahasa pemogramannya.
              </p>
            </div>
          </div>
        </div>
      </section>
      <section class="digital-marketing-service" id="Aplikasi">
        <div class="row align-items-center">
          <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right">
            <h3 class="m-0">Halaman Admin</h3>
            <div class="col-lg-7 col-xl-6 p-0">
              <p class="py-4 m-0 text-muted">
                Halaman ini digunakan untuk dokter dan pegawai.
              </p>
            </div>
          </div>
          <div class="col-12 col-lg-5 p-0 img-digital grid-margin grid-margin-lg-0" data-aos="fade-left">
            <img src="{{ ('landing_pages/images/admin.jpeg') }}" alt="" class="img-fluid">
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-12 col-lg-7 text-center flex-item grid-margin" data-aos="fade-right">
            <img src="{{ asset('landing_pages/images/mobile.png') }}" width="50%" alt="" class="img-fluid">
          </div>
          <div class="col-12 col-lg-5 flex-item grid-margin" data-aos="fade-left">
            <h3 class="m-0">Aplikasi Mobile</h3>
            <div class="col-lg-9 col-xl-8 p-0">
              <p class="py-4 m-0 text-muted">
                Digunakan pasien untuk melakukan pendaftaran , melihat jadwal dokter, melihat antrian , melihat riwayat pemeriksaan , dan lain lain.
              </p>
            </div>
          </div>
        </div>
      </section>
      <section class="case-studies" id="tim">
        <div class="row grid-margin">
          <div class="col-12 text-center pb-5">
            <h2>Tim</h2>
            <h6 class="section-subtitle text-muted">
                Anggota Tim Untuk Mengerjakan Tugas Besar
            </h6>
          </div>
          <div class="col-12 col-md-6 col-lg-4 stretch-card mb-3 mb-lg-0" data-aos="zoom-in">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="bg-primary text-center card-contents">
                  <div class="card-image">
                    <img src="{{ asset('landing_pages/images/zikri.webp') }}" width="90%" alt="">
                  </div>
                </div>
                <div class="card-details text-center pt-4">
                    <h6 class="m-0 pb-1">Zikri Afnan | 3411191109</h6>
                    <p>Mobile Developer</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="bg-warning text-center card-contents">
                  <div class="card-image">
                      <img src="{{ asset('landing_pages/images/kafi.webp') }}" width="90%" alt="">
                  </div>
                </div>
                <div class="card-details text-center pt-4">
                    <h6 class="m-0 pb-1">Moch Nurul Kafi | 3411191101</h6>
                    <p>Mobile Developer , Web Developer , Backend</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="bg-violet text-center card-contents">
                  <div class="card-image">
                      <img src="{{ asset('landing_pages/images/daffa.webp') }}" width="90%" alt="">
                  </div>
                </div>
                <div class="card-details text-center pt-4">
                    <h6 class="m-0 pb-1">Daffa Putra Permana | 3411191104</h6>
                    <p>Mobile Developer , Web Developer , Backend</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="contact-us" id="contact-section">
        <div class="contact-us-bgimage grid-margin" >
          <div class="pb-4">
            <h4 class="px-3 px-md-0 m-0" data-aos="fade-down">Do you have any projects?</h4>
            <h4 class="pt-1" data-aos="fade-down">Contact us</h4>
          </div>
          <div data-aos="fade-up">
            <button class="btn btn-rounded btn-outline-danger">Contact us</button>
          </div>
        </div>
      </section>
      <section class="contact-details" id="contact-details-section">
        <div class="row text-center text-md-left">
          <div class="col-12 col-md-6 col-lg-3 grid-margin">
            <img src="images/Group2.svg" alt="" class="pb-2">
            <div class="pt-2">
              <p class="text-muted m-0">mikayla_beer@feil.name</p>
              <p class="text-muted m-0">906-179-8309</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 grid-margin">
            <h5 class="pb-2">Get in Touch</h5>
            <p class="text-muted">Don’t miss any updates of our new templates and extensions.!</p>
            <form>
              <input type="text" class="form-control" id="Email" placeholder="Email id">
            </form>
            <div class="pt-3">
              <button class="btn btn-dark">Subscribe</button>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 grid-margin">
            <h5 class="pb-2">Our Guidelines</h5>
            <a href="#"><p class="m-0 pb-2">Terms</p></a>
            <a href="#" ><p class="m-0 pt-1 pb-2">Privacy policy</p></a>
            <a href="#"><p class="m-0 pt-1 pb-2">Cookie Policy</p></a>
            <a href="#"><p class="m-0 pt-1">Discover</p></a>
          </div>
          <div class="col-12 col-md-6 col-lg-3 grid-margin">
              <h5 class="pb-2">Our address</h5>
              <p class="text-muted">518 Schmeler Neck<br>Bartlett. Illinois</p>
              <div class="d-flex justify-content-center justify-content-md-start">
                <a href="#"><span class="mdi mdi-facebook"></span></a>
                <a href="#"><span class="mdi mdi-twitter"></span></a>
                <a href="#"><span class="mdi mdi-instagram"></span></a>
                <a href="#"><span class="mdi mdi-linkedin"></span></a>
              </div>
          </div>
        </div>
      </section>
      <footer class="border-top">
        <p class="text-center text-muted pt-4">Copyright © 2019<a href="https://www.bootstrapdash.com/" class="px-1">Bootstrapdash.</a>All rights reserved.</p>

        <p class="text-center text-muted pt-2">Distributed By: <a href="https://www.themewagon.com/" class="px-1" target="_blank">Themewagon</a></p>
      </footer>
      <!-- Modal for Contact - us Button -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Contact Us</h4>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="Name">Name</label>
                  <input type="text" class="form-control" id="Name" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="Email">Email</label>
                  <input type="email" class="form-control" id="Email-1" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="Message">Message</label>
                  <textarea class="form-control" id="Message" placeholder="Enter your Message"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('landing_pages/vendors/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('landing_pages/vendors/bootstrap/bootstrap.min.js') }}"></script>
  <script src="{{ asset('landing_pages/vendors/owl-carousel/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('landing_pages/vendors/aos/js/aos.js') }}"></script>
  <script src="{{ asset('landing_pages/js/landingpage.js') }}"></script>
</body>
</html>
