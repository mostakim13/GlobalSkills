<div class="modal fade" id="BlogsEditModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="BlogsEditModal{{$row->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="BlogsEditModal{{$row->id}}">{{$row->blogs_title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('update-blogs')}}" method="POST" enctype="multipart/form-data">
          @csrf
            <input type="hidden" name="id" value="{{$row->id}}">

            <div class="form-group">
              <label for="classroom_course_title">Blog Title</label>
              <input data-validation="required" type="text" class="form-control" name="blogs_title" aria-describedby="blogs_title" value="{{$row->blogs_title}}" placeholder="Enter title">

            </div>
            <div class="form-group">
              <label class="col-form-label">Short Description</label>
              <div>
                <textarea data-validation="required" class="form-control" name="short_description" >{{$row->short_description}} </textarea>
              </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Blogs Image</label>
                  <input data-validation="required" type="file" name="image" class="form-control-file" id="blogs_image" onchange="previewImage(this)">

                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>
