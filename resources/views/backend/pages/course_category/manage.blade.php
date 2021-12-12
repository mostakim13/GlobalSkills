@extends('admin.admin_master')


@section('admin_dashboard_content')






<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">Course Category</h4>
    <ul class="db-breadcrumb-list">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
      <li>Manage Course Category</li>
    </ul>
  </div>
  <!-- Card -->

  <div class="row" id="basic-table">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Course Category</h4>
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#Course_CategoryAddModal">Add</a>
        </div>
        @if(Session::has('category_added'))
        <div class="alert alert-success" role="alert">

          <div class="alert-body">
            {{Session::get('category_added')}}
          </div>
        </div>
        @endif
        @if(Session::has('category_updated'))
        <div class="alert alert-success" role="alert">

          <div class="alert-body">
            {{Session::get('category_updated')}}
          </div>
        </div>
        @endif

        <!-- Modal -->
        <div class="modal fade" id="Course_CategoryAddModal" tabindex="-1" role="dialog" aria-labelledby="Course_CategoryAddModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="Course_CategoryAddModal">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{route('store-maincategory')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label for="categorytitle">Category Title</label>
                      <input data-validation="required" type="text" class="form-control" name="mcategory_title" aria-describedby="categorytitle" placeholder="Enter title">

                    </div>


                    <div class="form-group">
                      <label for="custom select">Status</label>
                      <select class="form-control" name="status">

                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>

                      </select>
                    </div>



              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
                </form>
            </div>
          </div>
        </div>
        <div class="table table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Id</th>
                <th>Category Title</th>


                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $course_categories = App\Models\CourseCategory::all();

               ?>
              @foreach ($course_categories as $row)
              <tr>
                <td>{{$row->id}}</td>
                <td>

                  <span class="font-weight-bold">{{$row->mcategory_title}}</span>
                </td>


                <td>
                  @if($row->status=="active")
                  Active

                  @else
                  Inactive
                  @endif



                  </td>
                <td>
                  <a href="/admin/home/course_category/edit/{{$row->id}}"><i class="fas fa-edit"></i></a>
                  <a id="delete" href="/admin/home/course_category/delete/{{$row->id}}"><i class="fas fa-trash"></i></a>

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





@endsection
