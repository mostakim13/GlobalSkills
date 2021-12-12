@extends('frontend.layouts.master')


@section('content')



<!-- Content -->

<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url({{asset('images/banner/banner3.jpg')}});">
        <div class="container">
            <div class="page-banner-entry">
              <br/>
              <br/>

     </div>
        </div>
    </div>
<!-- Breadcrumb row -->
<div class="breadcrumb-row">
  <div class="container">
    <ul class="list-inline">
      <li><a href="{{route('home')}}">Home</a></li>
      <li>Request Certificate</li>
    </ul>
  </div>
</div>
<!-- Breadcrumb row END -->

    <!-- inner page banner -->
    <div class="page-banner contact-page section-sp2">
        <div class="container">
            <div class="row">
      <div class="col-lg-5 col-md-5 m-b30">
        <div class="bg-primary text-white contact-info-bx">
          <h2 class="m-b10 title-head">Contact <span>Information</span></h2>

          <div class="widget widget_getintuch">
            <ul>
              <li><i class="ti-location-pin"></i>Hayat Rose Park
                  Level 5, House No 16
                  Main Road, Bashundhara Residential Area
                  Dhaka 1229
                  Bangladesh</li>
              <li><i class="ti-mobile"></i>+88 01766 343 434</li>
              <li><i class="ti-email"></i>info@globalskills.com.bd</li>
            </ul>
          </div>
          <h5 class="m-t0 m-b20">Follow Us</h5>
          <ul class="list-inline contact-social-bx">
            <li><a href="#" class="btn outline radius-xl"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" class="btn outline radius-xl"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" class="btn outline radius-xl"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#" class="btn outline radius-xl"><i class="fa fa-google-plus"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-7 col-md-7">

          <div class="heading-bx left">
            <h2 class="title-head">Request for <span>Certificate</span></h2>

          </div>
          <div class="row">
            <div class="col">
              <a class="btn btn-primary float-right" data-toggle="modal" data-target="#CertificateRequest" href="#">Request For Certificate</a>


            </div>

            <!--<div class="col">
              <a class="btn btn-primary float-left" href="#">Order hard Copy</a>
            </div>-->
            <br>


          </div>
  <p style="color:red; margin-top:30px;"><strong>You can Order Hard Copy of Certificate (*** BDT 300 will be applicable excluding Vat & Tax ***)</strong></p>


      </div>

    </div>


        </div>
</div>
    <!-- inner page banner END -->
</div>
<!-- Content END-->

  @include('frontend.modals.request_certificatemodal')
  @push('scripts')


  <script>
  $(".form-control classroom").select2({
    tags: true
  });
  </script>




  @endpush

@endsection
