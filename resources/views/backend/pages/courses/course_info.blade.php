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
            <a class="nav-link active" style="color:red;" href="/admin/home/courses/course_details/course_info/{{$course->id}}">Course Info</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/admin/home/courses/course_details/course_curricullum/{{$course->id}}">Course Curricullum</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Media</a>
          </li>

        </ul>
      </div>
    </div>
  </div>
  <!-- Base Nav ends -->


</div>
<br>
<div class="card">
    <div class="card-header">

<a href="#"data-toggle="modal" data-target="#CourseDetailsEditModal"><i class="fas fa-edit"></i></a>
@include('backend.modals.course_details_editmodal')
</div>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>
          Course Id
        </th>
        <th>Course Title</th>

        <th>Banner Images</th>
        <th>Short Description</th>
        <th>Course Description</th>
        <th>Learning Outcomes</th>
        <th>Certification</th>
        <th>Instructor ID</th>
        <th>Skill</th>
        <th>Language</th>
        <th>Quiz</th>

      </tr>
    </thead>
    <tbody>


      <tr>
        <td>
            {{$course->id}}
        </td>
        <td>
            {{$course->course_title}}

        </td>
        <td>
          <div class="avatar-group">
            <div
              data-toggle="tooltip"
              data-popup="tooltip-custom"
              data-placement="top"
              title=""
              class="avatar pull-up my-0"
              data-original-title=""
            >
              <img
                src="{{asset('storage/courses/banners/'.$course->course_details->banner_image)}}"
                alt="image"
                height="50"
                width="50"

              />
            </div>


          </div>

        </td>

        <td>
          {!!$course->course_details->short_description!!}


        </td>
        <td>
            {!!$course->course_details->course_description!!}

        </td>
        <td>

              {!!$course->course_details->learning_outcomes!!}

        </td>
        <td>

              {{$course->course_details->certification}}
        </td>

        <td>
            {{$course->course_details->instructor_id}}
        </td>
        <td>
            {{$course->course_details->skill}}
          </td>
        <td>
            {{$course->course_details->language}}

        </td>
        <td>

            {{$course->course_details->quiz}}
        </td>

      </tr>




    </tbody>
  </table>
</div>
</div>


@include('backend.modals.course_details_addmodal')















@endsection
