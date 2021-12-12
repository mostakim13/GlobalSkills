<div class="modal fade" id="LessonEditModal{{ $lesson->id }}" tabindex="-1" role="dialog" aria-labelledby="LessonEditModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="LessonEditModal">Edit Section</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('lesson-update') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id" value="{{ $lesson->id }}">
              <input type="hidden" name="section_id" value="{{$section->id}}">
              <input type="hidden" name="course_id" value="{{$course->id}}">


              <div class="form-group">
                  <label for="custom select">Video Type</label>
                  <select class="form-control" name="video_type" value={{ $lesson->video_type }}>
                    <option value="Youtube">Youtube</option>
                      <option value="Vimeo">Vimeo</option>

                  </select>
              </div>


              <div class="form-group">
                  <label for="vimeo_id">Vimeo Id</label>
                  <input type="number" class="form-control" name="vimeo_id" aria-describedby="vimeo_id"
                         placeholder="Vimeo Id" value={{ $lesson->vimeo_id }}>

              </div>
              <div class="form-group">
                  <label for="vimeo_id">Youtube Url</label>
                  <input type="text" class="form-control" name="youtube_url" aria-describedby="youtube_url"
                         placeholder="Youtube Url" value={{ $lesson->youtube_url }}>

              </div>
              <div class="form-group">
                 <label for="lesson_title">Lesson Title</label>
                 <input type="text" class="form-control" name="lesson_title" aria-describedby="lesson_title"
                        placeholder="Enter Lesson name" value="{{old('lesson_title', $lesson->lesson_title)}}">

             </div>

              <div class="form-group">
           <label for="custom select">Preview</label>
           <select class="form-control" name="preview" value={{ $lesson->preview }}>
            <option value="0">Not Preview</option>

               <option value="1">Preview</option>

           </select>
       </div>
              <div class="form-group">
                  <label for="exampleFormControlFile1">Lesson Files</label>
                  <input type="file" name="lesson_file" class="form-control-file" id="files"
                         >
              </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
          </form>
      </div>
    </div>
  </div>
