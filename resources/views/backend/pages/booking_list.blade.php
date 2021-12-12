@extends('admin.admin_master')


@section('admin_dashboard_content')






<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">Booking List</h4>
    <ul class="db-breadcrumb-list">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
      <li>User</li>
    </ul>
  </div>

  <!-- Card -->

  <div class="row" id="basic-table">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Classroom Course Booking request</h4>

        </div>


        <!-- Modal -->

        <div class="table table-responsive">
          <table id="booking_list" class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>User Name</th>

                <th>Email</th>
                <th>Phone Number</th>
                <th>Course Name</th>
                <th>Category</th>
                <th>Created At</th>
                <th>IP</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($bookings as $row)

              <tr>
                <td>{{$loop->index+1}}</td>
                <td>
                    {{$row->user->name}}

                </td>

                <td>
                    {{$row->user->email}}
                </td>
                <td>
                    {{$row->user->phone}}
                </td>
                <td>
                {{$row->classroom_course->classroom_course_title}}


                </td>

                <td>{{$row->course_category->mcategory_title}}</td>
                <td>
                  {{$row->created_at}}
                </td>
                <td>{{$row->ip_address}}</td>
                <td></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-lg-12 m-b20">

            {{$data->links('frontend.partials.pagination')}}

        </div>
      </div>
    </div>
  </div>

</div>

<script>
  $(function(){
    'use strict';

    $('#booking_list').DataTable({
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
