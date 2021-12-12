@extends('frontend.layouts.master')


@section('content')



<!-- Content -->

<div class="page-content">
    <!-- Page Heading Box ==== -->
    <div class="page-banner ovbl-dark" style="background-image:url({{ asset('images/banner/banner2.jpg')}});">
        <div class="container">
            <div class="page-banner-entry">
              <br/>
              <br/>
                
     </div>
        </div>
    </div>
<div class="breadcrumb-row">
  <div class="container">
    <ul class="list-inline">
      <li><a href="#">Home</a></li>
      <li>About Us</li>
    </ul>
  </div>
</div>
<!-- Page Heading Box END ==== -->
<!-- Page Content Box ==== -->
<div class="content-block">
        <!-- About Us ==== -->

  <!-- About Us END ==== -->
        <!-- Our Story ==== -->
  <div class="section-area bg-gray section-sp1 our-story">
    <div class="container">
      <div class="row align-items-center d-flex">
        <div class="col-lg-5 col-md-12 heading-bx">
          <h2 class="m-b10">Why Global Skills Development Agency?</h2>

          <p></p>
          <p>1. Our Participants doing better in Career</p>
          <p>2. Most satisfaction rating  in Google reviews by your colleagues and friends</p>
          <p>3. Highest Passing rate in world most difficult Exams</p>
          <p>4. Only Authorized Training Organization with Internationally Accredited Trainers, Training Materials from Global Authority</p>

        </div>
          <div class="col-lg-5 col-md-12 heading-bx">
        <iframe width="700" height="420" src="https://www.youtube.com/embed/slyY95bNF8E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
  <!-- Our Story END ==== -->
  <!-- Our Status ==== -->
  <div class="section-area content-inner section-sp1">
            <div class="container">
                <div class="section-content">
                     <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30">
                            <div class="counter-style-1">
                                <div class="text-primary">
                <span class="counter">100</span><span>+</span>
              </div>
              <span class="counter-text">Courses</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30">
                            <div class="counter-style-1">
              <div class="text-black">
                <span class="counter">2500</span><span>+</span>
              </div>
              <span class="counter-text">Happy Clients</span>
            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30">
                            <div class="counter-style-1">
              <div class="text-primary">
                <span class="counter">500</span><span>+</span>
              </div>
              <span class="counter-text">Reviews</span>
            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30">
                            <div class="counter-style-1">
              <div class="text-black">
                <span class="counter">100</span><span>+</span>
              </div>
              <span class="counter-text">Countries</span>
            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  <!-- Our Status END ==== -->
  <!-- About Content ==== -->
  <div class="section-area section-sp2 bg-fix ovbl-dark join-bx text-center" style="background-image:url({{ asset('images/background/bg1.jpg')}});">
            <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="join-content-bx text-white">
            <h2>Learn a new skill online on <br/> your time</h2>
            <h4><span class="counter">100 </span> Online Courses</h4>
            <br>

            <a href="{{route('register')}}" class="btn button-md">Join Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- About Content END ==== -->
  <!-- Testimonials ==== -->
  <!--<div class="section-area section-sp2">
    <div class="container">
      <div class="row">
        <div class="col-md-12 heading-bx left">
          <h2 class="title-head text-uppercase">what people <span>say</span></h2>
          <p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
        </div>
      </div>
      <div class="testimonial-carousel owl-carousel owl-btn-1 col-12 p-lr0">
        <div class="item">
          <div class="testimonial-bx">
            <div class="testimonial-thumb">
              <img src="{{ asset('images/testimonials/pic1.jpg')}}" alt="">
            </div>
            <div class="testimonial-info">
              <h5 class="name">Peter Packer</h5>
              <p>-Art Director</p>
            </div>
            <div class="testimonial-content">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type...</p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="testimonial-bx">
            <div class="testimonial-thumb">
              <img src="{{ asset('images/testimonials/pic2.jpg')}}" alt="">
            </div>
            <div class="testimonial-info">
              <h5 class="name">Peter Packer</h5>
              <p>-Art Director</p>
            </div>
            <div class="testimonial-content">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type...</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>-->
  <!-- Testimonials END ==== -->
</div>
<!-- Page Content Box END ==== -->
</div>
<br>
<!-- Inner Content Box END ==== -->
<!-- Content END-->




@endsection
