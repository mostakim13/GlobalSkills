<div class="modal fade" id="TrainingCourseAddModal" tabindex="-1" role="dialog" aria-labelledby="TrainingCourseAddModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TrainingCourseAddModal">Add Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="TrainingCourseAddForm" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="categorytitle">Course Title</label>
            <input type="text" class="form-control" id="course_title" name="course_title" aria-describedby="categorytitle" placeholder="Enter title">

          </div>
          <div class="form-group">
              <label for="exampleFormControlFile1">Course Thumbnails</label>
                <input type="file" name="file" class="form-control-file" id="image">
          </div>
          <div class="form-group">
            <label for="custom select">Select Course Category</label>
            <select class="form-control" id="course_category_id" name="course_category_id">
              <option label="Choose category"></option>
              <?php foreach ($course_categories as $course_category): ?>
                <option value="{{$course_category->id}}">{{$course_category->mcategory_title}}</option>

              <?php endforeach; ?>

            </select>
          </div>
          <div class="form-group">
            <label for="validationCustom04" class="form-label">Select Main Category</label>
            <select class="form-control" id="main_category_id" name="main_category_id">
              <option label="Choose main category"></option>
              <?php foreach ($main_categories as $main_category): ?>
                <option value="{{$main_category->id}}">{{$main_category->mcategory_title}}</option>

              <?php endforeach; ?>

            </select>
          </div>
            <div class="form-group">
              <label for="training_fee">Training Price</label>
              <input type="number" class="form-control" name="training_fee" id="training_fee" aria-describedby="training_price" placeholder="Enter Price">

            </div>

            <div class="form-group">
              <label class="col-form-label">Short Description</label>
              <div>
                <textarea class="form-control" name="short_description" id="short_description"> </textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-form-label">Course Description</label>
              <div>
                <textarea class="form-control" name="course_description" id="course_description"> </textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-form-label">Learning Outcomes</label>
              <div>
                <textarea class="form-control" name="learning_outcomes" id="learning_outcomes"> </textarea>
              </div>
            </div>



            <div class="form-group">
              <label for="custom select">Status</label>
              <select class="form-control" name="status" id="status">

                <option value="1">Active</option>
                <option value="0">Inactive</option>

              </select>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="saveBtn" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>
