@extends('admin.admin_master')


@section('admin_dashboard_content')






<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">Edit Category</h4>
    <ul class="db-breadcrumb-list">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>

      <li>Edit {{$mcategory->mcategory_title}} Category</li>
    </ul>
  </div>
  <!-- Card -->
  <div class="row match-height">
    <div class="col-md-12 col-lg-12" >
      <div class="card">
        <img class="center" style="margin-top:20px;"
          src="{{asset("storage/category/$mcategory->image")}}"
          alt="image"
          height="500"
          width="500"

        />
        <div class="card-body">
          <h4 class="card-title">{{$mcategory->mcategory_title}}</h4>

          <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#CategoryEditModal">Edit</a>
        </div>
      </div>
    </div>

  </div>



</div>
<div class="modal fade" id="CategoryEditModal" tabindex="-1" role="dialog" aria-labelledby="CategoryEditModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CategoryEditModal">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('update-mcategory')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$mcategory->id}}">
            <div class="form-group">
              <label for="categorytitle">Category Title</label>
              <input data-validation="required" type="text" class="form-control" name="mcategory_title" aria-describedby="categorytitle" value="{{$mcategory->mcategory_title}}" placeholder="Enter title">

            </div>

            <div class="form-group">
              <label for="custom select">Status</label>
              <select class="form-control" name="status" value="{{$mcategory->status}}">

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
