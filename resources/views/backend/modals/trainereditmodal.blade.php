<div class="modal fade" id="TrainerEdit{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="TrainerEditModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TrainerEditModal{{$row->id}}">Edit Trainer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('update-trainer')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$row->id}}">
            <input type="hidden" name="old_image" value="{{ $row->image }}">
            <input type="hidden" name="old_image1" value="{{ $row->signature }}">

              <div class="form-group">
                <label for="classroom_course_title" >Name</label>
                <input data-validation="required" value="{{ $row->name }}" type="text" class="form-control" name="name" aria-describedby="name" placeholder="Enter Name">

              </div>
              <div class="form-group">
                <label for="custom select">Select Course</label>
                <select class="form-control" name="course_id">
                  <option label="Choose Course"></option>
                  <?php foreach ($course as $item): ?>
                    <option value="{{$item->id}}">{{$item->course_title}}</option>

                  <?php endforeach; ?>




                </select>
              </div>
              <div class="form-group">
                <label class="col-form-label">Designation</label>
                <div>
                  <input  class="form-control" value="{{ $row->designation }}" name="designation"> </input>
                </div>
              </div>
              <div class="form-group">
                <label class="col-form-label">Fb link</label>
                <div>
                  <input  class="form-control" name="facebook_profile" value="{{ $row->facebook_profile }}"> </input>
                </div>
              </div>
              <div class="form-group">
                <label class="col-form-label">Linkdin link</label>
                <div>
                  <input  class="form-control" name="linkdin_profile" value="{{ $row->linkdin_profile }}"> </input>
                </div>
              </div>
              <div class="form-group">
                <label class="col-form-label">Biography</label>
                <div>
                  <textarea class="form-control" id="bio" name="biography" value="{{ $row->biography }}" > </textarea>
                </div>
              </div>
              <div class="form-group">
                  <label for="exampleFormControlFile1">Image</label>
                    <input  type="file" name="image" class="form-control-file" id="image" >
                  </div>
                   <div class="form-group">
                    <label class="form-control-label">Signature: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="file" name="signature" >
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
          </form>
      </div>
    </div>
  </div>
  @push('scripts')
  <script>
    $(document).ready(function() {
      $('#bio').summernote();
    });
    </script>

  @endpush
