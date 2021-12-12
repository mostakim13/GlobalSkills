<div class="modal fade" id="FaqAdd" tabindex="-1" role="dialog" aria-labelledby="BlogsAddModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="BlogsAddModal">Add Faq</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label for="classroom_course_title" >Subject</label>
                <input data-validation="required" type="text" class="form-control" name="subject" aria-describedby="name" placeholder="Enter Subject">
              </div>

              <div class="form-group">
                <label class="col-form-label">Description</label>
                <div>
                  <textarea id="description" class="form-control" name="description"> </textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-form-label">Video Url</label>
                <div>
                  <input  class="form-control" name="video_url"> </input>
                </div>
              </div>
                   <div class="form-group">
                    <label class="form-control-label">Image: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="file" name="image"  onchange="Image(this)">
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
        function Image(input){
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
<script>
    $(document).ready(function() {
      $('#description').summernote();
    });
    </script>
