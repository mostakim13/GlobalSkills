@extends('frontend.layouts.master')


@section('content')



<!-- Content -->

<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url({{ asset('images/banner/banner3.jpg')}});">
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
      <li>Search Results</li>
    </ul>
  </div>
</div>
<!-- Breadcrumb row END -->
    <!-- inner page banner END -->
<div class="content-block">
        <!-- About Us -->
  <div class="section-area section-sp1">
            <div class="container">
       <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-12 m-b30">
          <div class="widget courses-search-bx placeani">
            <div class="form-group">
              <div class="input-group">
                <label>Search Courses</label>
                <input name="dzName" type="text" required class="form-control">
              </div>
            </div>
          </div>
          <div class="widget widget_archive">
                            <h5 class="widget-title style-1">All Courses Categories</h5>
                            <ul>
                                <li class="active"><a href="#">General</a></li>

                                @foreach($course_categories as $row)
                                <li><a href="#">{{$row->mcategory_title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
          <div class="widget">
            <a href="#"><img src="{{ asset('images/adv/adv.jpg')}}" alt=""/></a>
          </div>
          <div class="widget recent-posts-entry widget-courses">
                            <h5 class="widget-title style-1">Recent Courses</h5>
                            <div class="widget-post-bx">
                              @foreach($lts_c as $row)
                                <div class="widget-post clearfix">
                                    <div class="ttr-post-media"> <img src="{{asset("storage/courses/$row->course_image")}}" width="200" height="143" alt=""> </div>
                                    <div class="ttr-post-info">
                                        <div class="ttr-post-header">
                                            <h6 class="post-title"><a href="{{ url('home/course_details/'.$row->id.'/'.$row->elearning_slug) }}">{{$row->course_title}}</a></h6>
                                        </div>
                                        <div class="ttr-post-meta">
                                            <ul>
                                                <li class="price">
                                                  <del>{{$row->regular_price}}৳</del>
                                                  <h5>{{$row->sale_price}}৳</h5>
                                                </li>
                                                <li class="review">03 Review</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
        </div>
        <div class="col-sm-8">
            <div class="">
                <h4>Search Results</h4>
                <br>
                @forelse ($course as $item)
                    <div class="searched-item">
                        <a href="{{ url('home/course_details/'.$row->id.'/'.$row->elearning_slug) }}">
                            <div class="design-li">
                                <h5>{{$item->main_category->mcategory_title}}</h5>
                                <img src="{{asset("storage/courses/$item->course_image")}}" alt="" height="80px;" width="80px;">
                                <strong >{{ $item['course_title'] }}</strong> <hr>

                            </div>
                        </a>

                    </div>
                    @empty
                    <h3 style="color: red; padding:0 20px;">No E-Learning Courses Found</h3>
                @endforelse


                @forelse ($course1 as $item)
                <div class="searched-item">
                    <a href="{{ url('home/classroom/course_details/'.$row->id.'/'.$row->classroom_slug) }}">
                        <div class="design-li">
                            <h5>{{$item->main_category->mcategory_title}}</h5>
                            <img src="{{asset("storage/Classroom courses/$item->classroom_course_image")}}" alt="" height="80px;" width="80px;">
                            <strong >{{ $item['classroom_course_title'] }}</strong> <hr>

                        </div>
                    </a>

                </div>
                @empty
                <h3 style="color: red; padding:0 20px;">No Classroom Courses Found</h3>
            @endforelse

            </div>
        </div>
      </div>
    </div>
        </div>
    </div>
<!-- contact area END -->

</div>
<!-- Content END-->




@endsection
