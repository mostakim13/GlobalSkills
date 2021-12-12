@extends('admin.admin_master')


@section('admin_dashboard_content')






<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">Events</h4>
    <ul class="db-breadcrumb-list">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
      <li>Events</li>
    </ul>
  </div>
  <!-- Card -->

  <div class="row" id="basic-table">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Events</h4>
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#EventAddModal"><i class="fas fa-plus-circle"></i></a>
            @include('backend.modals.addeventmodal')
        </div>
        @if(Session::has('event_added'))
        <div class="alert alert-success" role="alert">

          <div class="alert-body">
            {{Session::get('event_added')}}
          </div>
        </div>

        @elseif(Session::has('event_deleted'))
        <div class="alert alert-danger" role="alert">

          <div class="alert-body">
            {{Session::get('event_updated')}}
          </div>
        </div>
        <div class="alert alert-success" role="alert">

          <div class="alert-body">
            {{Session::get('event_updated')}}
          </div>
        </div>


        @endif


        <!-- Modal -->
        <div class="table table-responsive">
          <table class="table table-bordered" id="course_table">
            <thead>
              <tr>
                <th>
                  No
                </th>
                <th>Event Title</th>
                <th>Description</th>
                <th>Event Image</th>

                <th>Month</th>
                  <th>Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($events as $row)
              <tr>
                <td><span class="font-weight-bold">{{$loop->index+1}}</span></td>
                <td><span class="font-weight-bold">{{$row->event_title}}
                </span></td>
                <td>
                    {{$row->description}}

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
                        src="{{asset('storage/events/' .$row->event_image)}}"
                        alt="image"
                        height="50"
                        width="50"

                      />
                    </div>


                  </div>
                  </td>
                <td>
                    {{$row->month}}
                </td>
                <td>

                  {{$row->date}}
                </td>






                <td>
                  <a href="/admin/home/events/event-details/{{$row->id}}"><i class="fas fa-upload"></i></a>

                  <a href="#" data-toggle="modal" data-target="#EventEditModal{{$row->id}}" ><i class="fas fa-edit"></i></a>

                  <a href="/admin/home/events/delete/{{$row->id}}"><i class="fas fa-trash"></i></a>
                  @include('backend.modals.editeventmodal')

                </td>
              </tr>
              @endforeach


            </tbody>
          </table>
        </div>
        <div class="col-lg-12 m-b20">



        </div>
      </div>
    </div>
  </div>

</div>

@endsection
