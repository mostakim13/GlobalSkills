@extends('admin.admin_master')
@section('admin_dashboard_content')
@section('active')
   trainers
@endsection

<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">Trainer List</h4>
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
            <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#TrainerAdd"><i class="fas fa-plus-circle"></i></a>
            @include('backend.modals.traineraddmodal')
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
                  {{ $row->course->course_title }}
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
                          src="{{asset($row->image)}}"
                          alt="image"
                          height="50"
                          width="50"

                        />
                      </div>


                    </div>
                </td>

                <td>
                    <a href="#" data-toggle="modal" data-target="#TrainerEdit{{$row->id}}"><i class="fas fa-edit"></i></a>

                  <a  href="/admin/trainer-delete/{{$row->id}}" id="delete"><i class="fas fa-trash"></i></a>
                      @include('backend.modals.trainereditmodal')

                </td>




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
