@extends('admin.admin_master')


@section('admin_dashboard_content')






<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">Classroom Courses</h4>
    <ul class="db-breadcrumb-list">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
      <li>Classroom Courses</li>
    </ul>
  </div>
  <!-- Card -->

  <div class="row" id="basic-table">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Classroom Courses</h4>
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#ClassroomCourseAddModal"><i class="fas fa-plus-circle"></i></a>
          @include('backend.modals.classroom_courseaddmodal')
        </div>
        @if(Session::has('course_added'))
        <div class="alert alert-success" role="alert">

          <div class="alert-body">
            {{Session::get('course_added')}}
          </div>
        </div>

        @elseif(Session::has('course_deleted'))
        <div class="alert alert-danger" role="alert">

          <div class="alert-body">
            {{Session::get('course_deleted')}}
          </div>
        </div>


        @elseif(Session::has('course_updated'))
        <div class="alert alert-success" role="alert">

          <div class="alert-body">
            {{Session::get('course_updated')}}
          </div>
        </div>

        @endif





        <!-- Modal -->

        <div class="table table-responsive">
          <table class="table table-bordered" id="classroom_course_list">
            <thead>
              <tr>
                <th>
                  Course Id
                </th>
                <th>Course Title</th>

                <th>Images</th>
                <th>Main Category</th>
                <th>Course Category</th>
                <th>Regular Price</th>
                <th>Sale Price</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

              @foreach($classroom_courses as $row)
              <tr>

                <td>{{$row->id}}</td>
                <td>

                  <span class="font-weight-bold">{{$row->classroom_course_title}}</span>
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
                        src="{{asset("storage/Classroom courses/$row->classroom_course_image")}}"
                        alt="image"
                        height="50"
                        width="50"

                      />
                    </div>


                  </div>
                <td>

                  <span class="font-weight-bold">{{$row->main_category->mcategory_title}} </span>
                </td>
                <td>

                  <span class="font-weight-bold"> {{$row->course_category->mcategory_title}}</span>
                </td>

                <td>{{$row->training_fee}}৳</td>
                <td>{{$row->exam_fee}}৳</td>


                </td>
                <td>
                  @if($row->status==1)
                  Active

                  @else
                  Inactive
                  @endif
                  </td>
                <td>
                  <a href="/admin/home/classroom/courses/course_details/{{$row->id}}"><i class="fas fa-file-upload"></i></a>
                  <a href="#" data-toggle="modal" data-target="#ClassroomCourseEditModal{{$row->id}}" ><i class="fas fa-edit"></i></a>

                  <a id="delete" href="/admin/home/classroom/courses/delete/{{$row->id}}"><i class="fas fa-trash"></i></a>
                  @include('backend.modals.classroom_courseeditmodal')

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      
      </div>
    </div>
  </div>

</div>
<script>
  $(function(){
    'use strict';

    $('#classroom_course_list').DataTable({
      responsive: true,
      language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ ',
      }
    });


  });
</script>
@endsection
