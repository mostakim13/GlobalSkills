<div class="modal fade" id="EventEditModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="EventEditModal{{$row->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EventEditModal{{$row->id}}">Edit Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('update-events')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$row->id}}">

            <div class="form-group">
              <label for="classroom_course_title">Event Title</label>
              <input type="text" class="form-control" name="event_title" value="{{$row->event_title}}" aria-describedby="event_title" placeholder="Enter title">

            </div>
            <div class="form-group">
              <label class="col-form-label">Description</label>
              <div>
                <textarea class="form-control" name="description"> </textarea>
              </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Event Image (700*300 pixels)</label>
                  <input type="file" name="image" class="form-control-file" id="event_image" onchange="previewImage(this)">

                </div>
                <div class="form-group">
                  <label for="classroom_course_title">Month (Start)</label>
                  <input type="text" class="form-control" value="{{$row->month}}" name="month" aria-describedby="month" placeholder="Enter Month">

                </div>
                <div class="form-group">
                  <label for="classroom_course_title">Date (Start Date)</label>
                  <input type="number" class="form-control" value="{{$row->date}}" name="date" aria-describedby="date" placeholder="Enter Date">

                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>
