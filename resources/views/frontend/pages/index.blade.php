@extends('frontend.layouts.master')


@section('content')

<!-- Content -->
  <!-- Main Slider -->
@include('frontend.content.sliders')
    <!-- Main Slider -->
<div class="content-block">

  <!-- Our Services -->
  @include('frontend.content.inner_service')

  <!-- E-learning Courses -->
  @include('frontend.content.e-learning')
  <!-- E-learning Courses END -->

  <!-- Classroom -->
  @include('frontend.content.classroom')
  <!-- Classroom -->
  <!--@include('frontend.content.training_without_exam')-->
  @include('frontend.content.accreditation')

  <!-- Mock Test -->
  @include('frontend.content.mockTest')
  <br>
  <br>

  <!-- Mock Test -->

  <!-- Form -->
  @include('frontend.content.overview_banner')

  <!-- Form END -->
  @include('frontend.content.events')


  <!-- Testimonials -->


  <!-- Testimonials END -->

  <!-- Recent News -->
  @include('frontend.content.recent_news')
  <br><br>

  <!-- Recent News End -->


    </div>
<!-- contact area END -->

<!-- Content END-->

@endsection
