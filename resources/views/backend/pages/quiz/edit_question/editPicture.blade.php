@extends('admin.admin_master')
@section('view-questions')
active 
@endsection

@section('admin_dashboard_content')
     <!-- ########## START: MAIN PANEL ########## -->
     <div class="sl-mainpanel container">
<div class="sl-pagebody">
    <div class="card">
        <div class="box-inn-sp admin-form">
            <div class="sb2-2-add-blog sb2-2-1" style="padding:20px">
        <h6 class="card-body-title">Update Picture Question</h6>
        <form action="{{ route('picture-update') }}" method="POST">
        @csrf
        <input type="hidden" name="old_image" value="{{ $pictures->question_image }}">
        <input type="hidden" name="question_id" value="{{ $pictures->id }}">
        <div class="row row-sm">
            <div class="form-group">
                <label class="form-control-label">Select Course: <span class="tx-danger">*</span></label>
                <select class="form-control select2-show-search" data-placeholder="Select one"
                name="course_id">
                    <option label="Choose one"></option>
                    @foreach ($courses as $cat)
                    <option value="{{ $cat->id }}" {{ $cat->id == $pictures->course_id? 'selected':'' }}>{{ ucwords($cat->course_title) }}</option>
                    @endforeach
                  </select>
                @error('course_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        <div class="card-body">
                        
                <img src="{{ asset($pictures->question_image) }}" class="card-img-top" style="height: 60px; width:60px;" alt="...">
            <div class="form-group">
                <label class="form-control-label">Question Image: <span class="tx-danger">*</span></label>
                <input class="form-control" type="file" name="question_image" onchange="picture(this)">
                @error('question_image')
                <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>
            <img src="" id="pictureId">
        </div>

                <div class="form-group">
                    <label class="form-control-label">Question: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="question" value="{{ $pictures->question }}">
                    @error('question')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                  
                <div class="form-group">
                    <label class="form-control-label">First Option: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="option1" value="{{ $pictures->option1 }}">
                    @error('option1')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Second Option: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="option2" value="{{ $pictures->option2 }}">
                    @error('option2')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Third Option: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="option3" value="{{ $pictures->option3 }}">
                    @error('option3')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Fourth Option: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="option4" value="{{ $pictures->option4 }}">
                    @error('option4')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Answer: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="answer" value="{{ $pictures->answer }}">
                    @error('answer')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                 
              <div class="form-layout-footer mt-3">
                    <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Update Question</button>
              </div><!-- form-layout-footer -->
        </div>
        </form>
            </div>
        </div>
    </div>
</div>
</div><!-- row -->

<script>
    function picture(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e){
            $('#pictureId').attr('src',e.target.result).width(80)
                  .height(80);
        };
        reader.readAsDataURL(input.files[0]);


      }
    }
  </script>

@endsection