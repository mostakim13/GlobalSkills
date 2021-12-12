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
        <h6 class="card-body-title">Update True False Question</h6>
        <form action="{{ route('true-false-update') }}" method="POST">
        @csrf
        <input type="hidden" name="question_id" value="{{ $truefalses->id }}">
        <div class="row row-sm">
            <div class="form-group">
                <label class="form-control-label">Select Course: <span class="tx-danger">*</span></label>
                <select class="form-control select2-show-search" data-placeholder="Select one"
                name="course_id">
                    <option label="Choose one"></option>
                    @foreach ($courses as $cat)
                    <option value="{{ $cat->id }}" {{ $cat->id == $truefalses->course_id? 'selected':'' }}>{{ ucwords($cat->course_title) }}</option>
                    @endforeach
                  </select>
                @error('course_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

                <div class="form-group">
                    <label class="form-control-label">Question: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="question" value="{{ $truefalses->question }}">
                    @error('question')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">First Option: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="question" value="{{ $truefalses->option1 }}">
                    @error('question')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Second Option: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="question" value="{{ $truefalses->option2 }}">
                    @error('question')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Answer: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="question" value="{{ $truefalses->answer }}">
                    @error('question')
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