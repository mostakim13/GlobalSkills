<div class="modal fade" id="SectionAddModal" tabindex="-1" role="dialog" aria-labelledby="SectionAddModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SectionAddModal">Add Section</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('store-section')}}" method="POST" enctype="multipart/form-data">
          @csrf
            <input type="hidden" name="course_id" value="{{$course->id}}">









            <div class="form-group">
              <label for="order">Order No</label>
              <input type="number" class="form-control" name="order" aria-describedby="order" placeholder="Section No">

            </div>

            <div class="form-group">
              <label for="section_name">Section Title</label>
              <input type="text" class="form-control" name="section_name" aria-describedby="section_name" placeholder="Enter section name">

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
