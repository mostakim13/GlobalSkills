@extends('admin.admin_master')


@section('admin_dashboard_content')






<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">Evolution List</h4>
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
          <h4 class="card-title">Evolution Lists</h4>

        </div>


        <!-- Modal -->

        <div class="table table-responsive">
          <table id="evolution" class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>User Name</th>

                <th>Email</th>
                <th>Company Name</th>
                <th>Phone Number</th>
                <th>Course Name</th>
                <th>Course Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Reason for participation:</th>
                <th>Trainer’s competence Review</th>
                <th>Training presentation material Review</th>
                <th>Course material Review</th>
                <th>Usefulness of the training</th>
                <th>Experience about training and exam booking</th>
                <th>Overall satisfaction in this training </th>

              </tr>
            </thead>
            <tbody>

              @foreach ($evolutions as $row)

              <tr>
                <td>{{$loop->index+1}}</td>
                <td>
                    {{$row->users->name}}

                </td>
                <td>{{$row->users->email}}</td>
                <td>{{$row->company_name}}</td>
                <td>{{$row->users->phone}}</td>

                <td>
                    {{$row->course->course_title}}
                </td>
                <td>
                    {{$row->course->main_category->mcategory_title}}
                </td>
                <td>
                {{$row->start_date}}


                </td>

                <td>{{$row->end_date}}</td>
                <td>
                  {{$row->reason}}
                </td>
                <td>{{$row->trainers_competence}}</td>
                <td>{{$row->presentation}}</td>
                <td>{{$row->material}}</td>
                <td>{{$row->usefullness}}</td>
                <td>{{$row->experience}}</td>
                <td>{{$row->satisfaction}}</td>
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

    $('#evolution').DataTable({
      responsive: false,
      language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ ',
      }
    });


  });
</script>




@endsection
