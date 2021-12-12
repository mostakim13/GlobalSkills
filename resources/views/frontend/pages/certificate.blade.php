@extends('frontend.layouts.master')


@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url({{ asset('images/banner/banner2.jpg')}});">
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
      <li>Download Certificate</li>
    </ul>
  </div>
</div>

<div class="container" style="margin-top:100px;">
  <div class="col-md-12 col-lg-12">
      <div class="card">

          <div class="card-body md-2">
              <h4 class="card-title">Download Certificate</h4>
            <a href="/home/download-pdf">Click here to Download Certificate</a>

      </div>
  </div>


</div>
<br><br><br>
</div>

@endsection
