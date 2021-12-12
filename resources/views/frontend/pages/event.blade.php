@extends('frontend.layouts.master')


@section('content')



<!-- Content -->

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
      <li>Events</li>
    </ul>
  </div>
</div>
<!-- Breadcrumb row END -->
    <!-- contact area -->
    <div class="content-block">
  <!-- Portfolio  -->
  <div class="section-area section-sp1 gallery-bx">
    <div class="container">
      <div class="feature-filters clearfix center m-b40">
        <ul class="filters" data-toggle="buttons">
          <li data-filter="" class="btn active">
            <input type="radio">
            <a href="#"><span>All</span></a>
          </li>
          <li data-filter="happening" class="btn">
            <input type="radio">
            <a href="#"><span>Happening</span></a>
          </li>
          <li data-filter="upcoming" class="btn">
            <input type="radio">
            <a href="#"><span>Upcoming</span></a>
          </li>
          <li data-filter="expired" class="btn">
            <input type="radio">
            <a href="#"><span>Expired</span></a>
          </li>
        </ul>
      </div>
      <div class="clearfix">
        <ul id="masonry" class="ttr-gallery-listing magnific-image row">
          <?php
          $events = App\Models\AdminEvent::all();

           ?>
          @foreach ($events as $row)
          <li class="action-card col-lg-6 col-md-6 col-sm-12 happening">
            <div class="event-bx m-b30">
              <div class="action-box">
                  <a href="/event_details/{{$row->id}}">
                <img src="{{asset('storage/events/' .$row->event_image)}}" alt=""></a>
              </div>
              <div class="info-bx d-flex">
                <div>
                  <div class="event-time">
                    <div class="event-date">{{$row->date}}</div>
                    <div class="event-month">{{$row->month}}</div>
                  </div>
                </div>
                <div class="event-info">
                  <h4 class="event-title"><a href="/event_details/{{$row->id}}">{{$row->event_title}}</a></h4>

                  <p>{{$row->description}}</p>
                </div>
              </div>
            </div>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
    </div>
<!-- contact area END -->
</div>
<!-- Content END-->




@endsection
