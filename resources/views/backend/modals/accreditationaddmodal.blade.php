<div class="modal fade" id="AccreditationAddModal" tabindex="-1" role="dialog" aria-labelledby="AccreditationAddModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AccreditationAddModal">Add Accreditation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('store-accreditation')}}" method="POST" enctype="multipart/form-data">
          @csrf


          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Enter Name">

          </div>



            <div class="form-group">
                <label for="exampleFormControlFile1">Accreditation Thumbnails</label>
                  <input type="file" name="file" class="form-control-file" id="accreditation_image" onchange="previewImage(this)">
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
