<header id="header-section">
    <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
    <div class="container">
      <div class="navbar-brand-wrapper d-flex w-100">
        <img src="{{ asset('landing_pages/images/Group2.svg') }}" alt="">
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="mdi mdi-menu navbar-toggler-icon"></span>
        </button> 
      </div>
      <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
        <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
          <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
            <div class="navbar-collapse-logo">
              <img src="{{ asset('landing_pages/images/Group2.svg') }}" alt="">
            </div>
            <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
            </button>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/landing_page') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('') }}">Pendaftaran</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('') }}">Poliklinik</a>  
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('') }}">Jadwal Dokter</a>
          </li>
          <li class="nav-item btn-contact-us pl-4 pl-lg-0">
            <button class="btn btn-info">Login</button>
            <button class="btn btn-info">Register</button>
          </li>
        </ul>
      </div>
    </div> 
    </nav>   
  </header>