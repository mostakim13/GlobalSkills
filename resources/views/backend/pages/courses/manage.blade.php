@extends('admin.admin_master')


@section('admin_dashboard_content')






<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">E-Learning Courses</h4>
    <ul class="db-breadcrumb-list">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
      <li>E-Learning Courses</li>
    </ul>
  </div>
  <!-- Card -->

  <div class="row" id="basic-table">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">E-Learning Courses</h4>
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#CourseAddModal">Add</a>
        </div>
        @if(Session::has('course_added'))
        <div class="alert alert-success" role="alert">

          <div class="alert-body">
            {{Session::get('course_added')}}
          </div>
        </div>

        @elseif(Session::has('course_updated'))
        <div class="alert alert-success" role="alert">

          <div class="alert-body">
            {{Session::get('course_updated')}}
          </div>
        </div>
        @elseif(Session::has('course_deleted'))
        <div class="alert alert-danger" role="alert">

          <div class="alert-body">
            {{Session::get('course_deleted')}}
          </div>
        </div>
        @endif

        <!-- Modal -->
        <div class="modal fade" id="CourseAddModal" tabindex="-1" role="dialog" aria-labelledby="CourseAddModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="CourseAddModal">Add Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{route('store-course')}}" method="POST" enctype="multipart/form-data">
                  @csrf

                    <div class="form-group">
                      <label for="categorytitle">Course Title</label>
                      <input type="text" class="form-control" name="course_title" aria-describedby="categorytitle" placeholder="Enter title">

                    </div>
                    <div class="form-group">
                      <label for="categorytitle">Accredation Name (If Exists)</label>
                      <input type="text" class="form-control" name="accredation_name" aria-describedby="categorytitle" placeholder="Enter title">

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Course Thumbnails</label>
                          <input type="file" name="file" class="form-control-file" id="course_image" onchange="previewImage(this)">
                    </div>
                    <div class="form-group">
                      <label for="custom select">Select Course Category</label>
                      <select class="form-control" name="course_category_id">
                        <option label="Choose category"></option>
                        <?php foreach ($course_categories as $course_category): ?>
                          <option value="{{$course_category->id}}">{{$course_category->mcategory_title}}</option>

                        <?php endforeach; ?>




                      </select>
                    </div>
                    <div class="form-group">
                      <label for="validationCustom04" class="form-label">Select Main Category</label>
                      <select class="form-control" name="main_category_id">
                        <option label="Choose main category"></option>
                        <?php foreach ($main_categories as $main_category): ?>
                          <option value="{{$main_category->id}}">{{$main_category->mcategory_title}}</option>

                        <?php endforeach; ?>





                      </select>
                    </div>
                    <div class="form-group">
                      <label for="regular_price">Regular Price</label>
                      <input type="number" class="form-control" name="regular_price" aria-describedby="regular_price" placeholder="Enter Price">

                    </div>
                    <div class="form-group">
                      <label for="sale_price">Sale Price</label>
                      <input type="number" class="form-control" name="sale_price" aria-describedby="sale_price" placeholder="Enter Sale Price">

                    </div>
                    <div class="form-group">
                      <label for="sale_price">Preview Video ID</label>
                      <input type="text" class="form-control" name="preview_id" aria-describedby="sale_price" placeholder="Enter Preview ID">

                    </div>
                    <div class="form-group">
                      <label for="custom select">Preview Video Type</label>
                      <select class="form-control" name="video_type">

                        <option value="1">Vimeo</option>
                        <option value="0">Youtube</option>

                      </select>
                    </div>

                    <div class="form-group">
                      <label for="custom select">Status</label>
                      <select class="form-control" name="status">

                        <option value="1">Active</option>
                        <option value="0">Inactive</option>

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
          <table class="table table-bordered" id="course_list">
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
                <th>Sale price</th>
                <th>Preview ID</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $courses = App\Models\Course::all();

               ?>
              @foreach ($courses as $row)
              <tr>
                <td>{{$row->id}}</td>
                <td>

                  <span class="font-weight-bold">{{$row->course_title}}</span>
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
                        src="{{asset("storage/courses/$row->course_image")}}"
                        alt="image"
                        height="50"
                        width="50"

                      />
                    </div>


                  </div>
                <td>

                  <span class="font-weight-bold">{{$row->main_category->mcategory_title}}</span>
                </td>
                <td>

                  <span class="font-weight-bold">{{$row->course_category->mcategory_title}}</span>
                </td>
                <td>{{$row->regular_price}}৳</td>
                <td>{{$row->sale_price}}৳</td>
                <td>{{ $row->preview_id }}</td>


                </td>
                <td>
                  @if($row->status==1)
                  Active

                  @else
                  Inactive
                  @endif
                  </td>
                <td>
                  <a href="/admin/home/courses/course_overviews/{{$row->id}}"><i class="fas fa-file-upload"></i></a>
                  <a href="#" data-toggle="modal" data-target="#CourseEditModal{{$row->id}}"><i class="fas fa-edit"></i></a>
                  <a id="delete" href="/admin/home/courses/delete/{{$row->id}}"><i class="fas fa-trash"></i></a>
                  @include('backend.modals.courseeditmodal')

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

    $('#course_list').DataTable({
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
