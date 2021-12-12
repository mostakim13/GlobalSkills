@extends('admin.admin_master')


@section('admin_dashboard_content')

<div class="db-breadcrumb">
  <h4 class="breadcrumb-title">Course Details</h4>
  <ul class="db-breadcrumb-list">
    <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
    <li>{{$classroom_course->classroom_course_title}} </li>
  </ul>
</div>


<div class="row match-height">
  <!-- Base Nav starts -->
  <div class="col-md-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">{{$classroom_course->classroom_course_title}}</h4>
      </div>
      <div class="card-body">

        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link active" style="color:red;" href="#">Course Info</a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="#">Media</a>
          </li>
          <a class="btn btn-primary" href=" /admin/home/classroom/courses/course_details/{{$classroom_course->id}}" >Back</a>


        </ul>
      </div>
    </div>
  </div>
  <!-- Base Nav ends -->


</div>
<br>
<div class="card">
    <div class="card-header">

<a href="#"  data-toggle="modal" data-target="#ClassroomCourseDetailsEditModal"><i class="fas fa-edit"></i></a>
@include('backend.modals.classroom_course_detailseditmodal')
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
        <th>Pass Marks</th>
        <th>Out of Marks</th>
        <th>Percentage</th>
        <th>No of Questions</th>
        <th>Exam Type</th>
        <th>Duration</th>
        <th>Exam Format</th>

      </tr>
    </thead>
    <tbody>


      <tr>

        <td>
            {{$classroom_course->id}}
        </td>
        <td>
            {{$classroom_course->classroom_course_title}}

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
                src="{{asset("storage/Classroomk Courses/banners/$classroom_course_details->classroom_banner_image")}}"
                alt="image"
                height="50"
                width="50"

              />
            </div>


          </div>

        </td>

        <td>

            {{$classroom_course_details->classroom_short_description}}

        </td>
        <td>
            {{$classroom_course_details->classroom_course_description}}

        </td>
        <td>
            {{$classroom_course_details->classroom_learning_outcomes}}


        </td>
        <td>
            {{$classroom_course_details->classroom_certification}}

        </td>

        <td>
            {{$classroom_course_details->classroom_instructor_id}}
        </td>
        <td>
              {{$classroom_course_details->pass_mark}}
          </td>
        <td>
            {{$classroom_course_details->out_of}}

        </td>
        <td>
          {{$classroom_course_details->pass_mark/$classroom_course_details->out_of*100}}%


        </td>
        <td>
            {{$classroom_course_details->no_of_questions}}
        </td>
        <td>

            {{$classroom_course_details->exam_type}}
        </td>
        <td>
            {{$classroom_course_details->duration}}
        </td>
        <td>
            {{$classroom_course_details->book}}
        </td>

      </tr>





    </tbody>
  </table>
</div>
</div>


















@endsection
