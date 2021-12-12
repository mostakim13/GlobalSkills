<div class="modal fade" id="BlogDetailsAddModal" tabindex="-1" role="dialog" aria-labelledby="BlogDetailsAddModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="BlogDetailsAddModal">Add Blog Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('store-blog-details')}}" method="POST" enctype="multipart/form-data">
          @csrf
            <input type="hidden" name="admin_blog_id" value="{{$blogs->id}}">
            <div class="form-group">
                <label for="exampleFormControlFile1">Blog Banner Thumbnails</label>
                  <input data-validation="required" type="file" name="file1" class="form-control-file" id="blog_banner_image">
            </div>
            <div class="form-group">
              <label for="no_of_lessons">Blogs Sub Tille</label>
              <input data-validation="required" type="text" class="form-control" name="sub_title" aria-describedby="sub_title" placeholder="Enter Title">

            </div>

            <div class="form-group">
              <label class="col-form-label">Sub Title Description</label>
              <div>
                <textarea required class="form-control" id="sub_title_description" name="sub_title_description"> </textarea>
              </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">Blog Content Image 1</label>
                  <input data-validation="required" type="file" name="file2" class="form-control-file" id="blog_content_img1">
            </div>
            <div class="form-group">
              <label for="no_of_lessons">Youtube Url 1</label>
              <input data-validation="required" type="text" class="form-control" name="youtube_url_1" aria-describedby="youtube_url_1" placeholder="Enter youtube url">

            </div>



            <div class="form-group">
              <label class="col-form-label">Blog Details Content</label>
              <div>
                <textarea required class="form-control" id="blog_details_content" name="blog_details_content"> </textarea>
              </div>
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
  $('#sub_title_description').summernote();
});
</script>
<script>
$(document).ready(function() {
  $('#blog_details_content').summernote();
});
</script>
