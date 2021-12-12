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
      <li>Courses Details</li>
      <li>{{$classroom_course->classroom_course_title}}</li>
    </ul>
  </div>
</div>
<br>
<br>
<div class="container">


@if(Session::has('booking_added'))
<div class="alert alert-success" role="alert">

  <div class="alert-body">
    {{Session::get('booking_added')}}
  </div>
</div>


@endif
</div>
<!-- Breadcrumb row END -->
    <!-- inner page banner END -->
<div class="content-block">
        <!-- About Us -->
  <div class="section-area section-sp1">
            <div class="container">
       <div class="row d-flex flex-row-reverse">
        <div class="col-lg-3 col-md-4 col-sm-12 m-b30">
          <div class="course-detail-bx">
            <div class="course-price">
              <del>{{$classroom_course->training_fee}}৳</del>
              <h4 class="price" style="color:#ca2128;">{{$classroom_course->exam_fee}}৳</h4>
            </div>
            <div class="course-buy-now text-center">
              <form class="hidden" action="{{route('store-bookings')}}" method="post">
                @csrf
                <input type="hidden" name="classroom_course_id" value="{{$classroom_course->id}}">
                <input type="hidden" name="course_category_id" value="{{$classroom_course->course_category->id}}">

                <button  class="btn">Booking Now This Course</button>
              </form>

            </div>
            <div class="teacher-bx">
            <!--  <div class="teacher-info">
                <div class="teacher-thumb">
                  <img src="{{asset('images/testimonials/pic1.jpg')}}" alt=""/>
                </div>
                <div class="teacher-name">
                  <h5>{{$classroom_course_details->classroom_instructor_id}}</h5>
                  <span></span>
                </div>
              </div>-->
            </div>
            <div class="cours-more-info">
              <div class="review">
                <span>Review</span>
                <ul class="cours-star">
                  @for ($i =1 ; $i <= 5 ; $i++)
                  <span style="color: red" class="fa fa-star{{ ($i <= $avgRating) ? '' : '-empty' }}"></span>
                @endfor
                <span>({{ count($courseReview) }})</span>
                <h4>5/{{ $avgRating }}</h4>

                </ul>
              </div>
              <div class="price categories">
                <span>Categories</span>
                <h5 class="text-primary">{{$classroom_course->course_category->mcategory_title}}</h5>
              </div>
            </div>
            <div class="course-info-list scroll-page">
              <ul class="navbar">
                <li><a class="nav-link" href="#overview"><i class="ti-zip"></i>Course Description</a></li>
                <li><a class="nav-link" href="#curriculum"><i class="ti-bookmark-alt"></i>Exam Format</a></li>
              <li><a class="nav-link" href="#instructor"><i class="ti-user"></i>Instructor</a></li>
                <li><a class="nav-link" href="#reviews"><i class="ti-comments"></i>Reviews</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-lg-9 col-md-8 col-sm-12">
          <div class="courses-post">
            <div class="ttr-post-media media-effec">
              <a href="#"><img src="{{asset("storage/Classroomk Courses/banners/$classroom_course_details->classroom_banner_image")}}"   alt="image"
                height="600"
                width="1000"></a>
            </div>
            <div class="ttr-post-info">
              <div class="ttr-post-title ">
                <h2 class="post-title">{{$classroom_course->classroom_course_title}}</h2>
              </div>
              <div class="ttr-post-text">

                {!!$classroom_course_details->classroom_short_description!!}
              </div>
            </div>
          </div>
          <div class="courese-overview" id="overview">

            <div class="row">

              <div class="col-md-12 col-lg-8">
                <h4 class="m-b5">Course Description</h4>
                {!!$classroom_course_details->classroom_course_description!!}
                  <div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>
                <h4 class="m-b5">THe Certification can help:</h4>
                {{$classroom_course_details->classroom_certification}}
                  <div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>
                <h4 class="m-b5">Learning Outcomes</h4>
                <ul class="list-checked primary">
                  {!!$classroom_course_details->classroom_learning_outcomes!!}

                </ul>
              </div>
            </div>
          </div>
          <div class="m-b30" id="curriculum">
            <h4>Exam Format</h4>
            <ul class="list-checked primary">
              <li>Multiple choice examination questions</li>
              <li>{{$classroom_course_details->no_of_questions}} questions</li>
              <li>{{$classroom_course_details->pass_mark}} marks required to pass (out of {{$classroom_course_details->out_of}} available) – {{$classroom_course_details->pass_mark/$classroom_course_details->out_of*100}}%</li>
              <li>{{$classroom_course_details->duration}} minutes’ duration</li>
              <li>{{$classroom_course_details->book}} book</li>

            </ul>
          </div>
          <div class="" id="instructor">
                <h4>Instructor</h4>

                @foreach ($trainer as $item)

                <div class="instructor-bx">
                  <div class="instructor-author">
                    <img src="{{asset($item->image)}}" alt="">
                  </div>
                  <div class="instructor-info">
                    <h6>{{$item->name}}</h6>
                    <span>{{ $item->designation }}</span>
                    <ul class="list-inline m-tb10">
                      <li><a href="{{ $item->facebook_profile }}" class="btn sharp-sm facebook"><i class="fab fa-facebook"></i></a></li>
                      <li><a href="{{ $item->linkdin_profile }}" class="btn sharp-sm linkedin"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                    <p class="m-b0">{!! $item->biography !!}</p>
                  </div>
                </div>
                @endforeach

              </div>
          <div class="" id="reviews">
              <h4>Reviews</h4>

              <div class="review-bx">
                <div class="product-add-review">
                  <h4 class="title">Write your own review</h4>
                  <div class="review-table">
                    <div class="table-responsive">
                      <form role="form" class="cnt-form" action="{{ route('store.review') }}" method="post">
                      <table class="table" >
                        @csrf
                        <input type="hidden" name="classroomcourse_id" value="{{$classroom_course->id}}">
                        <thead>
                          <tr>
                         <th class="cell-label">&nbsp;</th>
                         <th><i class="fa fa-star" style="color: red"></i></th>
                         <th><i class="fa fa-star" style="color: red"></i>
                           <i class="fa fa-star"  style="color: red"></i></th>
                         <th><i class="fa fa-star" style="color: red"></i>
                           <i class="fa fa-star" style="color: red"></i>
                           <i class="fa fa-star" style="color: red"></i></th>
                         <th><i class="fa fa-star" style="color: red"></i>
                           <i class="fa fa-star" style="color: red"></i>
                           <i class="fa fa-star" style="color: red"></i>
                           <i class="fa fa-star" style="color: red"></i></th>
                         <th><i class="fa fa-star" style="color: red"></i>
                           <i class="fa fa-star" style="color: red"></i>
                           <i class="fa fa-star" style="color: red"></i>
                           <i class="fa fa-star" style="color: red"></i>
                           <i class="fa fa-star" style="color: red"></i></th>
                       </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="cell-label">Rating</td>
                            <td><input type="radio" name="rating" class="radio" value="1"></td>
                            <td><input type="radio" name="rating" class="radio" value="2"></td>
                            <td><input type="radio" name="rating" class="radio" value="3"></td>
                            <td><input type="radio" name="rating" class="radio" value="4"></td>
                            <td><input type="radio" name="rating" class="radio" value="5"></td>
                          </tr>
                          @error('rating')
                              <span class="text text-danger">{{ $message }}</span>
                          @enderror

                        </tbody>
                      </table><!-- /.table .table-bordered -->
                    </div><!-- /.table-responsive -->
                  </div><!-- /.review-table -->

                  <div class="review-form">
                    <div class="form-container">


                        <div class="row">

                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="exampleInputReview">Review <span class="astk">*</span></label>
                              <textarea class="form-control txt txt-review" id="exampleInputReview" name="comment" rows="4" placeholder=""></textarea>
                              @error('comment')
                              <span class="text text-danger">{{ $message }}</span>
                              @enderror
                            </div><!-- /.form-group -->
                          </div>
                        </div><!-- /.row -->

                        <div class="action text-right">
                          <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                        </div><!-- /.action -->

                      </form><!-- /.cnt-form -->
                      @foreach ($courseReview as $review)


                      <div class="product-reviews">
  											<h5 class="title">{{ $review->user->name }}</h5>

                        <div class="reviews">
  												<div class="review">
  													<div class="review-title">
                                <span class="summary">
                              @for ($i =1 ; $i <= 5 ; $i++)
                               <span style="color: red" class="fa fa-star{{ ($i <= $review->rating) ? '' : '-empty' }}"></span>
                             @endfor
                                </span>
                             <span class="date"><i class="fa fa-calendar"></i><span> {{ $review->created_at->diffForHumans() }}</span></span></div>
  													<div class="text">"{{ $review->comment }}" </div>
                          </div>
  											</div><!-- /.reviews -->
  										</div><!-- /.product-reviews -->
                      @endforeach
                    </div><!-- /.form-container -->
                  </div><!-- /.review-form -->

                </div><!-- /.product-add-review -->


              </div>

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
