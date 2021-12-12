@extends('admin.admin_master')
@section('admin_dashboard_content')

<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">Customer Contact</h4>
    <ul class="db-breadcrumb-list">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
      <li>Reviews</li>
    </ul>
  </div>


  <!-- Card -->
  <div class="row" id="basic-table">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Contacts</h4>
       <a href="#" class="btn btn-success" data-toggle="modal" data-target="#"><i class="fas fa-plus"></i></a>
        </div>

        <div class="table table-responsive">
          <table id="message_list" class="table table-bordered">
            <thead>
              <tr>
                <th>SL</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Report Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $row)

              <tr>
              <td>{{ $loop->index+1 }}</td>
                <td class="user_name">
                    {{$row->name}}
                </td>

                <td>
                    {{$row->email}}
                </td>
                <td>
                    {{ $row->phone }}
                </td>
                <td>
                    <textarea name="" id="" cols="30" disabled rows="2">{{ $row->message }}</textarea>

                </td>
                <td>{{ $row->created_at }}</td>
                <td>
                  <a id="delete" href="/admin/delete/{{$row->id}}"><i class="fas fa-trash"></i></a>
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


@push('scripts')
<script>
      $(function(){
    'use strict';

    $('#message_list').DataTable({
      responsive: false,
      language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ ',
      }
    });
  })
    </script>
@endpush

@endsection
