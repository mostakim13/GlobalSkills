@extends('admin.admin_master')


@section('admin_dashboard_content')






<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">Events</h4>
    <ul class="db-breadcrumb-list">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
      <li>Event Details</li>
    </ul>
  </div>
  <!-- Card -->
  <div class="row match-height">
    <!-- Base Nav starts -->
    <div class="col-md-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Event Detail View</h4>
              <a class="float-right" href="{{route('manage-events')}}"><i class="fa fa-home fa-2x"></i></a>
              <a class="float-right" href="#"  data-toggle="modal" data-target="#EventDetailsEditModal"><i class="fa fa-edit fa-2x"></i></a>
                @include('backend.modals.event_detailseditmodal')
        </div>
        <div class="card-body">

          <div class="table table-responsive">
            <table class="table table-bordered" id="course_table">
              <thead>
                <tr>
                  <th>
                    Event Name
                  </th>
                  <th>Event Banner Image</th>
                  <th>Event Schedule & Time</th>
                  <th>Event Description</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>

                  @foreach($event_details as $row)
                <tr>

                  <td>{{$row->admin_event->event_title}} </td>
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
                            src="{{asset("storage/Events Banner/$row->event_banner_image")}}"




                            alt="image"
                            height="50"
                            width="50"

                          />
                        </div>


                      </div></td>


                  <td>

                    <span class="font-weight-bold">{!!$row->event_schedule!!} </span>
                  </td>

                  <td>{!!$row->event_description!!}</td>
                  <td></td>







                </tr>
                @endforeach

              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
    <!-- Base Nav ends -->


  </div>


</div>

@endsection
