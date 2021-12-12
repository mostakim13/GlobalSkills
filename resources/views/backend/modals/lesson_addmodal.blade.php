<div class="modal fade" id="LessonAddModal" tabindex="-1" role="dialog" aria-labelledby="LessonAddModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="LessonAddModal">Add Lesson</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('store-lesson')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="course_id" value="{{$course->id}}">

                    <input type="hidden" name="section_id" id="section_id">

                    <div class="form-group">
                        <label for="custom select">Video Type</label>
                        <select class="form-control" name="video_type">
                            <option label="Choose"></option>

                            <option value="Vimeo">Vimeo</option>
                            <option value="Youtube">Youtube</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="vimeo_id">Vimeo Id</label>
                        <input type="number" class="form-control" name="vimeo_id" aria-describedby="vimeo_id"
                               placeholder="Vimeo Id">

                    </div>
                    <div class="form-group">
                        <label for="vimeo_id">Youtube Url</label>
                        <input type="text" class="form-control" name="youtube_url" aria-describedby="youtube_url"
                               placeholder="Youtube Url">

                    </div>
                    <div class="form-group">
                        <label for="lesson_title">Lesson Title</label>
                        <input type="text" class="form-control" name="lesson_title" aria-describedby="lesson_title"
                               placeholder="Enter Lesson name">

                    </div>

                    <div class="form-group">
                 <label for="custom select">Preview</label>
                 <select class="form-control" name="preview">
                     <option label="Choose"></option>

                     <option value="1">Preview</option>
                     <option value="0">Not Preview</option>
                 </select>
             </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Lesson Files</label>
                        <input type="file" name="file" class="form-control-file" id="files"
                               onchange="previewImage(this)">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
