@extends('admin.admin_master')


@section('admin_dashboard_content')






<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">Manage Category</h4>
    <ul class="db-breadcrumb-list">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
      <li>Manage Main Category</li>
    </ul>
  </div>
  <!-- Card -->

  <div class="row" id="basic-table">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Main Category</h4>
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#CategoryAddModal">Add</a>
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
        <div class="modal fade" id="CategoryAddModal" tabindex="-1" role="dialog" aria-labelledby="CategoryAddModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="CategoryAddModal">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{route('store-mcategory')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label for="categorytitle">Category Title</label>
                      <input data-validation="required" type="text" class="form-control" name="mcategory_title" aria-describedby="categorytitle" placeholder="Enter title">

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Category Image</label>
                          <input data-validation="required" type="file" name="file" class="form-control-file" id="image" onchange="previewImage(this)">
                    </div>

                    <div class="form-group">
                      <label for="custom select">Status</label>
                      <select class="form-control" name="status" >

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

                <th>Images</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $categories = App\Models\MainCategory::all();

               ?>
              @foreach ($categories as $row)
              <tr>
                <td>{{$row->id}}</td>
                <td>

                  <span class="font-weight-bold">{{$row->mcategory_title}}</span>
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
                        src="{{asset("storage/category/$row->image")}}"
                        alt="image"
                        height="50"
                        width="50"

                      />
                    </div>


                  </div>
                </td>
                <td>
                  @if($row->status=="active")
                  Active

                  @else
                  Inactive
                  @endif



                  </span></td>
                <td>
                  <a href="/admin/home/main_category/edit/{{$row->id}}"><i class="fas fa-edit"></i></a>


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
        function previewImage(input){
          var file=$("input[type=file]").get(0).files[0];
          if(file)
          {
            var reader = new FileReader();
            reader.onload =function()
            {
              $('#image').attr("src",reader.result);
            }
            reader.readAsDataURL(file);
          }
        }

</script>




@endsection
