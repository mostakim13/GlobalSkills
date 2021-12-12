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
        <h6 class="card-body-title">Update Multiple Question</h6>
        <form action="{{ route('multiple-update') }}" method="POST">
        @csrf
        <input type="hidden" name="question_id" value="{{ $multiples->id }}">
        <div class="row row-sm">
            <div class="form-group">
                <label class="form-control-label">Select Course: <span class="tx-danger">*</span></label>
                <select class="form-control select2-show-search" data-placeholder="Select one"
                name="course_id">
                    <option label="Choose one"></option>
                    @foreach ($courses as $cat)
                    <option value="{{ $cat->id }}" {{ $cat->id == $multiples->course_id? 'selected':'' }}>{{ ucwords($cat->course_title) }}</option>
                    @endforeach
                  </select>
                @error('course_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

                <div class="form-group">
                    <label class="form-control-label">Question: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="question" value="{{ $multiples->question }}">
                    @error('question')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                  
                <div class="form-group">
                    <label class="form-control-label">First Option: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="option1" value="{{ $multiples->option1 }}">
                    @error('option1')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Second Option: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="option2" value="{{ $multiples->option2 }}">
                    @error('option2')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Third Option: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="option3" value="{{ $multiples->option3 }}">
                    @error('option3')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Fourth Option: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="option4" value="{{ $multiples->option4 }}">
                    @error('option4')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Answer: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="answer" value="{{ $multiples->answer }}">
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

@endsection