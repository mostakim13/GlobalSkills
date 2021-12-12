@extends('admin.admin_master')
@section('admin_dashboard_content')
@section('active')
   trainers
@endsection

<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">Classroom Trainer List</h4>
    <ul class="db-breadcrumb-list">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
      <li>Trainer</li>
    </ul>
  </div>


  <!-- Card -->
  <div class="row" id="basic-table">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <h4 class="card-title">Trainer</h4>
            <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#ClassroomTrainerAdd"><i class="fas fa-plus-circle"></i></a>
            @include('backend.modals.classroomtraineraddmodal')
          </div>



        <div class="table table-responsive">
          <table id="user_list" class="table table-bordered">
            <thead>
              <tr>
                <th class="wd-10">Id</th>
                <th>Name</th>
                <th>Course</th>
                <th class="wd-10">Designation</th>
                <th>Fb Link</th>
                <th>Lindin Link</th>
                <th>Biography</th>
                <th>Image</th>
                <th>Signature</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($trainer as $row)

              <tr>
                <td>{{$row->id}}</td>
                <td class="user_name">
                    {{$row->name}}

                </td>
                <td>
                  {{ $row->classroom_course->classroom_course_title }}
                </td>

                <td>
                    {{$row->designation}}
                </td>
                <td>
                    {{ $row->facebook_profile }}
                </td>
                <td>
                    {{ $row->linkdin_profile }}
                </td>
                <td>
                    <textarea name="" id="" cols="30" disabled rows="2">{{ $row->biography }}</textarea>
                </td>
                <td>
                    <img src="{{asset($row->image)}}" alt="">
                </td>
                <td>
                    <img src="{{asset($row->signature)}}" alt="">
                </td>

                <td>
                    <a href="#" data-toggle="modal" data-target="#ClassroomTrainerEditModal{{$row->id}}"><i class="fas fa-edit"></i></a>

                  <a  href="/admin/classroom-trainer-delete/{{$row->id}}" id="delete"><i class="fas fa-trash"></i></a>

                </td>
                 @include('backend.modals.classroomtrainereditmodal')


              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

    <!-- Modal -->

</div>




@endsection
