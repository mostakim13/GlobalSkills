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
      <li><a href="/">Home</a></li>
      <li>Event Details</li>
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
        <div class="col-lg-8 col-md-7 col-sm-12">
          <div class="courses-post">
            <div class="ttr-post-media media-effect">
              <img src="{{asset("storage/Events Banner/$event_details->event_banner_image")}}" alt="">
            </div>
            <div class="ttr-post-info">
              <div class="ttr-post-title ">
                <h2 class="post-title">{{$event_details->admin_event->event_title}}</h2>
              </div>
              <div class="ttr-post-text">
              <p>{{$event_details->admin_event->description}}</p>
              </div>
              <div class="ttr-post-text">
              {!!$event_details->event_schedule!!}
              </div>
              <div class="ttr-post-text">
              {!!$event_details->event_description!!}
              </div>
            </div>
          </div>
        <!--  <div class="courese-overview" id="overview">
            <div class="row">
              <div class="col-md-12 col-lg-5">
                <ul class="course-features">
                  <li><i class="ti-book"></i> <span class="label">Topics</span> <span class="value">Web design</span></li>
                  <li><i class="ti-help-alt"></i> <span class="label">Host</span> <span class="value">EduChamp</span></li>
                  <li><i class="ti-time"></i> <span class="label">Location</span> <span class="value">#45 Road</span></li>
                  <li><i class="ti-stats-up"></i> <span class="label">Skill level</span> <span class="value">Beginner</span></li>
                  <li><i class="ti-smallcap"></i> <span class="label">Language</span> <span class="value">English</span></li>
                  <li><i class="ti-user"></i> <span class="label">Students</span> <span class="value">32</span></li>
                  <li><i class="ti-check-box"></i> <span class="label">Assessments</span> <span class="value">Yes</span></li>
                </ul>
              </div>
              <div class="col-md-12 col-lg-7">
                <h5 class="m-b5">Event Description</h5>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                <h5 class="m-b5">Certification</h5>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                <h5 class="m-b5">Event Content</h5>
                <ul class="list-checked primary">
                  <li>Over 37 lectures and 55.5 hours of content!</li>
                  <li>LIVE PROJECT End to End Software Testing Training Included.</li>
                  <li>Learn Software Testing and Automation basics from a professional trainer from your own desk.</li>
                  <li>Information packed practical training starting from basics to advanced testing techniques.</li>
                  <li>Best suitable for beginners to advanced level users and who learn faster when demonstrated.</li>
                  <li>Course content designed by considering current software testing technology and the job market.</li>
                  <li>Practical assignments at the end of every session.</li>
                  <li>Practical learning experience with live project work and examples.cv</li>
                </ul>
              </div>
            </div>
          </div>-->
        </div>
        <div class="col-lg-4 col-md-5 col-sm-12 m-b30">
          <div class="bg-primary text-white contact-info-bx m-b30">
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
              <li><a href="https://www.facebook.com/globalskillsbd" class="btn outline radius-xl"><i class="fab fa-facebook"></i></a></li>
              <li><a href="https://twitter.com/gsdabd?lang=en" class="btn outline radius-xl"><i class="fab fa-twitter"></i></a></li>
              <li><a href="https://www.linkedin.com/company/globalskillsbd" class="btn outline radius-xl"><i class="fab fa-linkedin"></i></a></li>

            </ul>
          </div>



        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.1664037741634!2d90.42673481498255!3d23.812681084558736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c782948ffbf9%3A0xe43c376a71bfb570!2zR2xvYmFsIFNraWxscyBEZXZlbG9wbWVudCBBZ2VuY3kg4KaX4KeN4Kay4KeL4Kas4Ka-4KayIOCmuOCnjeCmleCmv-CmsuCmuCDgpqHgp4fgpq3gp4fgprLgpqrgpq7gp4fgpqjgp43gpp8g4KaP4Kac4KeH4Kao4KeN4Ka44Ka_!5e0!3m2!1sbn!2sbd!4v1632647227179!5m2!1sbn!2sbd" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

        </div>
      </div>
    </div>
        </div>
    </div>
<!-- contact area END -->

</div>
<!-- Content END-->




@endsection
