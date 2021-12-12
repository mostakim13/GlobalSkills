<div class="modal fade" id="EventDetailsEditModal" tabindex="-1" role="dialog" aria-labelledby="EventDetailsEditModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EventDetailsEditModal">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('update-event-details')}}" method="POST" enctype="multipart/form-data">
          @csrf


        <input type="hidden" name="admin_event_id" value="{{$events->id}}">
        <input type="hidden" name="id" value="{{$event_detail->id}}">


            <div class="form-group">
                <label for="exampleFormControlFile1">Event Banner Thumbnails(700*430 pixels)</label>
                  <input type="file" name="image" class="form-control-file" id="event_banner_image">
            </div>
            <div class="form-group">
              <label class="col-form-label">Event Schedule & Time</label>
              <div>
                <textarea class="form-control" id="event_schedule" name="event_schedule"> </textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-form-label">Event Description</label>
              <div>
                <textarea class="form-control" id="event_description" name="event_description"> </textarea>
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
  $('#event_schedule').summernote();
});
</script>
<script>
$(document).ready(function() {
  $('#event_description').summernote();
});
</script>
