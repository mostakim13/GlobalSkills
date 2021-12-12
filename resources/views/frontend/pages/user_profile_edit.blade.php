@extends('frontend.layouts.master')


@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url({{ asset('images/banner/banner1.jpg')}});">
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
          <li><a href="{{route('home')}}">Home</a></li>
          <li>User Profile</li>
          <li>{{Auth::user()->name}}</li>
        </ul>
      </div>
    </div>
    <div class="content-block">



      <div class="section-area section-sp1">
        <div class="card container">


      <div class="container">


      <div class="col-md-12">





      <div class="col-lg-9 col-md-12 col-sm-12 m-b30">

          <form action="#" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="">
              <div class="form-group row">
                <div class="col-12 col-sm-9 col-md-9 col-lg-10 ml-auto">
                  <h3>1. Personal Details</h3>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Occupation</label>
                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                  <input class="form-control" type="text" value="CTO">
                </div>
              </div>


              <div class="seperator"></div>

              <div class="form-group row">
                <div class="col-12 col-sm-9 col-md-9 col-lg-10 ml-auto">
                  <h3>2. Address</h3>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Address</label>
                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                  <input class="form-control" type="text" value="5-S2-20 Dummy City, UK">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">City</label>
                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                  <input class="form-control" type="text" value="Dhaka">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Division</label>
                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                  <input class="form-control" type="text" value="Dhaka">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Postcode</label>
                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                  <input class="form-control" type="number" value="1206">
                </div>
              </div>

              <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

              <div class="form-group row">
                <div class="col-12 col-sm-9 col-md-9 col-lg-10 ml-auto">
                  <h3 class="m-form__section">3. Social Links</h3>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Linkedin</label>
                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                  <input class="form-control" type="text" value="www.linkedin.com">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Facebook</label>
                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                  <input class="form-control" type="text" value="www.facebook.com">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Twitter</label>
                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                  <input class="form-control" type="text" value="www.twitter.com">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Instagram</label>
                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                  <input class="form-control" type="text" value="www.instagram.com">
                </div>
              </div>
            </div>
            <div class="">
              <div class="">
                <div class="row">
                  <div class="col-12 col-sm-3 col-md-3 col-lg-2">
                  </div>

                </div>
              </div>
            </div>
          </form>
          <div class="col-12 col-sm-9 col-md-9 col-lg-7">
            <button type="submit" class="btn">Save changes</button>
            <button type="reset" class="btn-secondry">Cancel</button>
          </div>



      </div>

      </div>
      </div>
      </div>




        </div>







    </div>















@endsection
