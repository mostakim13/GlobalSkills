<div class="modal fade" id="ClassroomCourseDetailsAddModal" tabindex="-1" role="dialog" aria-labelledby="ClassroomCourseDetailsAddModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ClassroomCourseDetailsAddModal">Add Classroom Course Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('store-classroom-course-details')}}" method="POST" enctype="multipart/form-data">
          @csrf
            <input type="hidden" name="classroom_course_id" value="{{$classroom_courses->id}}">

            <div class="form-group">
              <label class="col-form-label">Short Description</label>
              <div>
                <textarea id="short_description" class="form-control" name="classroom_short_description"> </textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-form-label">Course Description</label>
              <div>
                <textarea id="course_description" class="form-control" name="classroom_course_description"> </textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-form-label">Certification</label>
              <div>
                <textarea class="form-control" name="classroom_certification"> </textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-form-label">Learning Outcomes</label>
              <div>
                <textarea id="learning_outcomes" class="form-control" name="classroom_learning_outcomes"> </textarea>
              </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Classroom Course Banner Thumbnails</label>
                  <input type="file" name="file" class="form-control-file" id="classroom_banner_image" onchange="previewImage(this)">
            </div>




            <div class="form-group">
              <label for="classroom_instructor_id">Instructor Id</label>
              <input type="number" class="form-control" name="classroom_instructor_id" aria-describedby="instructor_id" placeholder="Instructor Id">

            </div>
            <div class="form-group">
              <label for="pass_mark">Pass Marks</label>
              <input type="number" class="form-control" name="pass_mark" aria-describedby="pass_mark" placeholder="Pass Marks">

            </div>
            <div class="form-group">
              <label for="out_of">Out of</label>
              <input type="number" class="form-control" name="out_of" aria-describedby="out_of" placeholder="Out of marks">

            </div>
            <div class="form-group">
              <label for="no_of_questions">No of Questions</label>
              <input type="number" class="form-control" name="no_of_questions" aria-describedby="no_of_questions" placeholder="Enter number of questions">

            </div>
            <div class="form-group">
              <label for="custom select">Exam Type</label>
              <select class="form-control" name="exam_type">
                <option label="Choose"></option>

                  <option value="Written">Written</option>

                  <option value="Multiple Choice Questions">M.C.Q</option>






              </select>
            </div>
            <div class="form-group">
              <label for="duration">Duration</label>
              <input type="number" class="form-control" name="duration" aria-describedby="duration" placeholder="Enter Duration">

            </div>

            <div class="form-group">
              <label for="custom select">Book</label>
              <select class="form-control" name="book">
                <option label="Choose"></option>

                  <option value="Open">Open</option>
                  <option value="Closed">Closed</option>






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
<!-- include libraries(jQuery, bootstrap) -->


<script>
$(document).ready(function() {
  $('#short_description').summernote();
});
</script>
<script>
$(document).ready(function() {
  $('#course_description').summernote();
});
</script>
<script>
$(document).ready(function() {
  $('#learning_outcomes').summernote();
});
</script>
