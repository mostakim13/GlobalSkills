@extends('admin.admin_master')


@section('admin_dashboard_content')

<div class="db-breadcrumb">
  <h4 class="breadcrumb-title">Course Details</h4>
  <ul class="db-breadcrumb-list">
    <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
    <li>{{$course->course_title}} </li>
  </ul>
</div>


<div class="row match-height">
  <!-- Base Nav starts -->
  <div class="col-md-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">{{$course->course_title}}</h4>
      </div>
      <div class="card-body">

        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link active" href="/admin/home/courses/course_details/course_info/{{$course->id}}">Course Info</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/admin/home/courses/course_details/course_curricullum/{{$course->id}}">Course Curricullum</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0);">Media</a>
          </li>
            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#CourseDetailsAddModal"><i class="fas fa-plus-circle"></i></a>
            @include('backend.modals.course_details_addmodal')
        </ul>
      </div>
    </div>
  </div>
  <!-- Base Nav ends -->


</div>



















@endsection
