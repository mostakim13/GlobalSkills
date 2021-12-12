@extends('admin.admin_master')
@section('admin_dashboard_content')

<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">Customer Review</h4>
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
          <h4 class="card-title">Reviews</h4>
       <a href="#" class="btn btn-success" data-toggle="modal" data-target="#"><i class="fas fa-plus"></i></a>
        </div>

        <div class="table table-responsive">
          <table id="user_list" class="table table-bordered">
            <thead>
              <tr>
                <th>Id</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Rating</th>
                <th>Status</th>
                <th>Comments</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($review as $row)

              <tr>
                <td>{{$row->id}}</td>
                <td class="user_name">
                    {{$row->user->name}}

                </td>

                <td>
                    {{$row->user->email}}
                </td>
                <td>
                    {{ $row->rating }}
                </td>
                <td>
                    <span class="badge badge-pill badge-success">{{ $row->status }}</span>
                    @if($row->status=='pending')
                    <a href="{{ url('/admin/review-approve/'.$row->id) }}" class="btn btn-sm btn-primary">Approve Now</a>
                    @endif
                </td>
                <td>
                    <textarea name="" id="" cols="30" disabled rows="2">{{ $row->comment }}</textarea>


                </td>

                <td>
                  <a id="delete" href="/admin/review-delete/{{$row->id}}"><i class="fas fa-trash"></i></a>

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
