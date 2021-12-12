<div class="modal fade" id="CourseEditModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="CourseEditModal{{$row->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CourseEditModal{{$row->id}}">Edit {{$row->course_title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('update-course')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$row->id}}">

            <div class="form-group">
              <label for="categorytitle">Course Title</label>
              <input type="text" class="form-control" value="{{$row->course_title}}" name="course_title" aria-describedby="categorytitle" placeholder="Enter title">

            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Course Thumbnails</label>
                  <input type="file" name="image" class="form-control-file" id="course_image" onchange="previewImage(this)">
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
              <input type="number" class="form-control" value="{{$row->regular_price}}" name="regular_price" aria-describedby="regular_price" placeholder="Enter Price">

            </div>
            <div class="form-group">
              <label for="sale_price">Sale Price</label>
              <input type="number" class="form-control" value="{{$row->sale_price}}" name="sale_price" aria-describedby="sale_price" placeholder="Enter Sale Price">

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
