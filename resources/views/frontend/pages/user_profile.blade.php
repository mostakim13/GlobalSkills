@extends('frontend.layouts.master')


@section('content')



<!-- Content -->
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
<!-- Breadcrumb row -->
<div class="breadcrumb-row">
  <div class="container">
    <ul class="list-inline">
      <li><a href="{{route('home')}}">Home</a></li>
      <li>User Profile</li>
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
          <div class="profile-bx text-center">
            <div class="user-profile-thumb">
              <img src="{{ asset('images/profile/pic1.jpg')}}" alt=""/>
            </div>
            <div class="profile-info">
              <h4>{{Auth::user()->name}}</h4>
              <span>{{Auth::user()->email}}</span>
            </div>
            <div class="profile-social">
              <ul class="list-inline m-a0">
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
              </ul>
            </div>
            <div class="profile-tabnav">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#courses"><i class="ti-book"></i>Courses</a>
                </li>
              <!--  <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#quiz-results"><i class="ti-bookmark-alt"></i>Quiz Results </a>
                </li>-->
              <!--  <li class="nav-item">
                  <a class="nav-link"  href="#edit-profile"><i class="ti-pencil-alt"></i>Edit Profile</a>
                </li>-->
                <li><a class="nav-link"  href="/user_profile/{{Auth::user()->id}}"> <i class="ti-pencil-alt"></i>Edit Profile</li></a>

                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#change-password"><i class="ti-lock"></i>Change Password</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-12 m-b30">
          <div class="profile-content-bx">
            <div class="tab-content">
              <div class="tab-pane active" id="courses">
                <div class="profile-head">
                  <h3>My Courses</h3>
                  <div class="feature-filters style1 ml-auto">

                  </div>
                </div>
                <div class="courses-filter">
                  <div class="clearfix">
                    <ul class="ttr-gallery-listing magnific-image row">
                      @foreach($users->user_enrollments as $row)

                      <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6">
                        <div class="cours-bx">
                          <div class="action-box">
                            <img src="{{asset('storage/courses/'.$row->course->course_image)}}" alt="" height="420"
                              width="700" alt="">
                            <a href="/home/course_details/view/{{$row->course->id}}/{{$row->course->elearning_slug}}" class="btn"><i class="fa fa-play-circle"></i></a>
                          </div>
                          <div class="info-bx text-center">
                            <h5><a href="/home/course_details/view/{{$row->course->id}}/{{$row->course->elearning_slug}}">{{Str::limit($row->course->course_title,18)}}</a></h5>
                            <span>{{$row->course->course_category->mcategory_title}}</span>
                          </div>
                          <div class="cours-more-info d-flex justify-content-center">

                            <a class="btn btn-primary" href="/home/course_details/view/{{$row->course->id}}/{{$row->course->elearning_slug}}"><i class="fa fa-play-circle"></i></a>
                          </div>
                        </div>
                      </li>
                      @endforeach


                    </ul>
                  </div>
                </div>
              </div>
            <!--<div class="tab-pane" id="quiz-results">
                <div class="profile-head">
                  <h3>Quiz Results</h3>
                </div>
                <div class="courses-filter">
                  <div class="row">
                    <div class="col-md-6 col-lg-6">
                      <ul class="course-features">
                        <li><i class="ti-book"></i> <span class="label">Lectures</span> <span class="value">8</span></li>
                        <li><i class="ti-help-alt"></i> <span class="label">Quizzes</span> <span class="value">1</span></li>
                        <li><i class="ti-time"></i> <span class="label">Duration</span> <span class="value">60 hours</span></li>
                        <li><i class="ti-stats-up"></i> <span class="label">Skill level</span> <span class="value">Beginner</span></li>
                        <li><i class="ti-smallcap"></i> <span class="label">Language</span> <span class="value">English</span></li>
                        <li><i class="ti-user"></i> <span class="label">Students</span> <span class="value">32</span></li>
                        <li><i class="ti-check-box"></i> <span class="label">Assessments</span> <span class="value">Yes</span></li>
                      </ul>
                    </div>
                    <div class="col-md-6 col-lg-6">
                      <ul class="course-features">
                        <li><i class="ti-book"></i> <span class="label">Lectures</span> <span class="value">8</span></li>
                        <li><i class="ti-help-alt"></i> <span class="label">Quizzes</span> <span class="value">1</span></li>
                        <li><i class="ti-time"></i> <span class="label">Duration</span> <span class="value">60 hours</span></li>
                        <li><i class="ti-stats-up"></i> <span class="label">Skill level</span> <span class="value">Beginner</span></li>
                        <li><i class="ti-smallcap"></i> <span class="label">Language</span> <span class="value">English</span></li>
                        <li><i class="ti-user"></i> <span class="label">Students</span> <span class="value">32</span></li>
                        <li><i class="ti-check-box"></i> <span class="label">Assessments</span> <span class="value">Yes</span></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>-->
              <div class="tab-pane" id="edit-profile">
                <div class="profile-head">
                  <h3>Edit Profile</h3>
                </div>
                <form class="edit-profile">
                  <div class="">
                    <div class="form-group row">
                      <div class="col-12 col-sm-9 col-md-9 col-lg-10 ml-auto">
                        <h3>1. Personal Details</h3>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Full Name</label>
                      <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                        <input class="form-control" type="text" value="Mark Andre">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Occupation</label>
                      <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                        <input class="form-control" type="text" value="CTO">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Company Name</label>
                      <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                        <input class="form-control" type="text" value="EduChamp">
                        <span class="help">If you want your invoices addressed to a company. Leave blank to use your full name.</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Phone No.</label>
                      <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                        <input class="form-control" type="text" value="+120 012345 6789">
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
                        <input class="form-control" type="text" value="US">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">State</label>
                      <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                        <input class="form-control" type="text" value="California">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Postcode</label>
                      <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                        <input class="form-control" type="text" value="000702">
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
                        <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                          <button type="reset" class="btn">Save changes</button>
                          <button type="reset" class="btn-secondry">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            @include('frontend.users.changepassword')
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
