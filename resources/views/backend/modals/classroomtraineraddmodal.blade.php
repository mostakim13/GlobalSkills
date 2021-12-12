<div class="modal fade" id="ClassroomTrainerAdd" tabindex="-1" role="dialog" aria-labelledby="BlogsAddModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="BlogsAddModal">Add Trainer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('add-trainer1')}}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label for="classroom_course_title" >Name</label>
                <input data-validation="required" type="text" class="form-control" name="name" aria-describedby="name" placeholder="Enter Name">

              </div>

              <div class="form-group">
                <label for="custom select">Select Course</label>
                <select class="form-control" name="classroom_course_id">
                  <option label="Choose Course"></option>
                  <?php foreach ($classroom_course as $item): ?>
                    <option value="{{$item->id}}">{{$item->classroom_course_title}}</option>
                  <?php endforeach; ?>




                </select>
              </div>
              <div class="form-group">
                <label class="col-form-label">Designation</label>
                <div>
                  <input  class="form-control" name="designation"> </input>
                </div>
              </div>
              <div class="form-group">
                <label class="col-form-label">Fb link</label>
                <div>
                  <input  class="form-control" name="facebook_profile"> </input>
                </div>
              </div>
              <div class="form-group">
                <label class="col-form-label">Linkdin link</label>
                <div>
                  <input  class="form-control" name="linkdin_profile"> </input>
                </div>
              </div>
              <div class="form-group">
                <label class="col-form-label">Biography</label>
                <div>
                  <textarea class="form-control" id="biography" name="biography"  > </textarea>
                </div>
              </div>
              <div class="form-group">
                  <label for="exampleFormControlFile1">Image</label>
                    <input  type="file" name="image" class="form-control-file" id="image" onchange="previewImage(this)">
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Signature: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="file" name="signature"  onchange="Signature(this)" data-validation="required">
                  <img src="" id="mainThmb">
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
      $('#biography').summernote();
    });
    </script>
    <script src="{{asset('backend')}}/lib/jquerysubsubcategory/jquery-2.2.4.min.js"></script>
    <script>
        function Signature(input){
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainThmb').attr('src',e.target.result).width(80)
                      .height(80);
            };
            reader.readAsDataURL(input.files[0]);
          }
        }
      </script>
