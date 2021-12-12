<div class="modal fade" id="BlogsAddModal" tabindex="-1" role="dialog" aria-labelledby="BlogsAddModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="BlogsAddModal">Add Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('add-blogs')}}" method="POST" enctype="multipart/form-data">
          @csrf

            <div class="form-group">
              <label for="classroom_course_title" >Blog Title</label>
              <input data-validation="required" type="text" class="form-control" name="blogs_title" aria-describedby="blogs_title" placeholder="Enter title">

            </div>
            <div class="form-group">
              <label class="col-form-label">Short Description</label>
              <div>
                <textarea  data-validation="required" class="form-control" name="short_description"> </textarea>
              </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Blogs Image</label>
                  <input data-validation="required" type="file" name="file" class="form-control-file" id="blogs_image" onchange="previewImage(this)">

                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>
