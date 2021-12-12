<div class="modal fade" id="CourseDetailsEditModal" tabindex="-1" role="dialog" aria-labelledby="CourseDetailsEditModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CourseDetailsEditModal">Add Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('update-course-details')}}" method="POST" enctype="multipart/form-data">
          @csrf

            <input type="hidden" name="id" value="{{$course_details->id}}">
          <input type="hidden" name="course_id" value="{{$course->id}}">

            <div class="form-group">
              <label class="col-form-label">Short Description</label>
              <div>
                <textarea class="form-control"  name="short_description" id="short_description" required> {{$course->course_details->short_description}}</textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-form-label">Course Description</label>
              <div>
                <textarea class="form-control" name="course_description" id="course_description" required>{{$course->course_details->course_description}} </textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-form-label">Learning Outcomes</label>
              <div>
                <textarea class="form-control" name="learning_outcomes" id="learning_outcomes" required> {{$course->course_details->learning_outcomes}}</textarea>
              </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Course Banner Thumbnails</label>
                  <input type="file" name="image" class="form-control-file" id="banner_image" onchange="previewImage(this)" required>
            </div>

            <div class="form-group">
              <label for="custom select">Certification</label>
              <select class="form-control" name="certification" required>
                <option label="Choose"></option>

                  <option value="Yes">Yes</option>
                  <option value="No">No</option>






              </select>
            </div>


            <div class="form-group">
              <label for="no_of_lessons">Instructor Id</label>
              <input type="number" class="form-control" value="{{$course->course_details->instructor_id}}" name="instructor_id" aria-describedby="instructor_id" placeholder="Instructor Id">

            </div>
            <div class="form-group">
              <label for="custom select">Skill</label>
              <select class="form-control" name="skill" required>
                <option label="Choose"></option>

                  <option value="Beginner">Beginner</option>
                  <option value="Mid Level">Mid Level</option>
                  <option value="Advance">Advance</option>






              </select>
            </div>
            <div class="form-group">
              <label for="custom select">Language</label>
              <select class="form-control" name="language" required>
                <option label="Choose"></option>

                  <option value="Bangla">Bangla</option>
                  <option value="English">English</option>







              </select>
            </div>
            <div class="form-group">
              <label for="custom select">Quiz</label>
              <select class="form-control" name="quiz" required>
                <option label="Choose"></option>

                  <option value="Yes">Yes</option>
                  <option value="No">No</option>






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
<script>
$(document).ready(function() {
  $('#ceetification').summernote();
});
</script>
