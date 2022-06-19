@extends('landing_page.layouts.main')

@section('content')
<section class="features-overview" >
    <div class="content-header">
      <h2>How does it works</h2>
      <h6 class="section-subtitle text-muted">One theme that serves as an easy-to-use operational toolkit<br>that meets customer's needs.</h6>
    </div>
    <div class="d-md-flex justify-content-between">
      <div class="grid-margin d-flex justify-content-start">
        <div class="features-width">
          <img src="{{ asset('landing_pages/images/Group12.svg') }}" alt="" class="img-icons">
          <h5 class="py-3">Speed<br>Optimisation</h5>
          <p class="text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
          <a href="#"><p class="readmore-link">Readmore</p></a>  
        </div>
      </div>
      <div class="grid-margin d-flex justify-content-center">
        <div class="features-width">
          <img src="{{ asset('landing_pages/images/Group7.svg') }}" alt="" class="img-icons">
          <h5 class="py-3">SEO and<br>Backlinks</h5>
          <p class="text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
          <a href="#"><p class="readmore-link">Readmore</p></a>
        </div>
      </div>
      <div class="grid-margin d-flex justify-content-end">
        <div class="features-width">
          <img src="{{ asset('landing_pages/images/Group5.svg') }}" alt="" class="img-icons">
          <h5 class="py-3">Content<br>Marketing</h5>
          <p class="text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
          <a href="#"><p class="readmore-link">Readmore</p></a>
        </div>
      </div>
    </div>
  </section>     
@endsection