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
        <div class="col-md-3">
          <div>
                <ul class="list-group list-group-flush">
                        <a class=" btn btn-sm btn-block" href="#">Home</a>
                        <a class=" btn btn-sm btn-block"  href="#">Result</a>
                </ul>    
              </div>
        </div>
         <div class="col-md-9">
                <div class="sl-mainpanel container">
                    <div class="sl-pagebody">    
                        <div class="card">
                            <div class="box-inn-sp admin-form">
                                <div class="sb2-2-add-blog sb2-2-1 d-flex justify-content-center" style="padding:20px">
                                    <div class="card" style="width: 18rem;">
                                        <ul class="list-group list-group-flush">
                                            <a href="" class="btn btn-primary btn-sm btn-block"> Multiple Question </a>
                                            
                                            <a href="" class="btn btn-primary btn-sm btn-block"> Descriptive Question </a>
                                            <a href="" class="btn btn-primary btn-sm btn-block"> Picture Question </a>
                                            <a href="" class="btn btn-primary btn-sm btn-block"> True False Question </a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         </div>
      </div>
    </div>
  </div>
  <!-- Our Story END ==== -->
  <!-- Our Status ==== -->
  <!-- Our Status END ==== -->
  <!-- About Content ==== -->
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
