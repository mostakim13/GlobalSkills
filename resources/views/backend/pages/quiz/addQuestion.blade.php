@extends('admin.admin_master')
@section('add-question')
 active 
 @endsection

@section('admin_dashboard_content')

<div class="sl-mainpanel container">
    <div class="sl-pagebody">    
        <div class="card">
            <div class="box-inn-sp admin-form">
                <div class="sb2-2-add-blog sb2-2-1" style="padding:20px">

                    <h2>Add New Question</h2>
                    
                    <ul class="nav nav-tabs tab-list">
                        
                        <li class="active"><a data-toggle="tab" href="#home" aria-expanded="true"><span style="color: black; font-size: 20px; margin-right:15px; font-weight: 700;">Multiple</span></a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#menu1" aria-expanded="false"><span style="color: black; font-size: 20px; margin-right:15px; font-weight: 700;">Description</span></a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#menu2" aria-expanded="false"><span style="color: black; font-size: 20px; margin-right:15px; font-weight: 700;">Picture</span></a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#menu3" aria-expanded="false"><span style="color: black; font-size: 20px;font-weight: 700;">TF</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade active">
                            <div class="box-inn-sp">
                                <div class="inn-title" style="padding: 15px 25px; background: #002147; margin-bottom:10px;">
                                    <h4 style="color:#fff;">Multiple Type Question</h4>
                                </div>
                                
                                <div class="border" style="padding: 30px 30px 15px 15px;">
                                    <form action="{{ route('multiple-question') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-control-label">Select Course: <span class="tx-danger">*</span></label>
                                        <select class="form-control select2-show-search" data-placeholder="Select one"
                                        name="course_id">
                                            <option label="Choose One"></option>
                                            @foreach ($courses as $row)
                                            <option value="{{ $row->id }}">{{ ucwords($row->course_title) }}</option>
                                            @endforeach
                                          </select>
                                        @error('course_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                        <div class="form-group">
                                            <label class="form-control-label">Question: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="question" placeholder="Enter question">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Enter first option: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="option1" placeholder="Please enter first option">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Enter second option: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="option2" placeholder="Please enter first option">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Enter third option: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="option3" placeholder="Please enter first option">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Enter fourth option: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="option4" placeholder="Please enter first option">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label">Answer: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="answer" placeholder="Please enter answer">
                                        </div>
                                       
                                        
                                            <div class="input-field col s12">
                                                <i class="waves-effect waves-light btn-large waves-input-wrapper" style=""><input type="submit" class="waves-button-input" value="Submit"></i>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="box-inn-sp">
                            <div class="inn-title" style="padding: 15px 25px; background: #002147; margin-bottom:10px;">
                                    <h4 style="color:#fff;">Description Type Question</h4>
                                </div>
                            <div class="border" style="padding: 30px 30px 15px 15px;">
                                    <form action="{{ route('description-question') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-control-label">Select Course: <span class="tx-danger">*</span></label>
                                            <select class="form-control select2-show-search" data-placeholder="Select one"
                                            name="course_id">
                                                <option label="Choose One"></option>
                                                @foreach ($courses as $course)
                                                <option value="{{ $course->id }}">{{ ucwords($course->course_title) }}</option>
                                                @endforeach
                                              </select>
                                            @error('course_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label">Question: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="question" placeholder="Enter question">
                                        </div>
                                            <div class="input-field col s12">
                                                <i class="waves-effect waves-light btn-large waves-input-wrapper" style=""><input type="submit" class="waves-button-input" value="Submit"></i>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <div class="box-inn-sp">
                                <div class="inn-title" style="padding: 15px 25px; background: #002147; margin-bottom:10px;">
                                    <h4 style="color:#fff;">Picture Type Question</h4>
                                </div>
                                <div class="border" style="padding: 30px 30px 15px 15px;">
                                    <form action="{{ route('picture-question') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-control-label">Select Course: <span class="tx-danger">*</span></label>
                                            <select class="form-control select2-show-search" data-placeholder="Select one"
                                            name="course_id">
                                                <option label="Choose One"></option>
                                                @foreach ($courses as $course)
                                                <option value="{{ $course->id }}">{{ ucwords($course->course_title) }}</option>
                                                @endforeach
                                              </select>
                                            @error('course_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Question: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="question" placeholder="Enter question">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Question Image: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="file" name="question_image">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Enter first option: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="option1" placeholder="Please enter first option">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Enter second option: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="option2" placeholder="Please enter first option">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Enter third option: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="option3" placeholder="Please enter first option">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Enter fourth option: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="option4" placeholder="Please enter first option">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label">Answer: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="answer" placeholder="Please enter answer">
                                        </div>
                                       
                                        
                                            <div class="input-field col s12">
                                                <i class="waves-effect waves-light btn-large waves-input-wrapper" style=""><input type="submit" class="waves-button-input" value="Submit"></i>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <div class="box-inn-sp">
                                <div class="inn-title" style="padding: 15px 25px; background: #002147; margin-bottom:10px;">
                                    <h4 style="color:#fff;">True False Question</h4>
                                </div>
                                <div class="border" style="padding: 30px 30px 15px 15px;">
                                    <form action="{{ route('true-false-question') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-control-label">Select Course: <span class="tx-danger">*</span></label>
                                            <select class="form-control select2-show-search" data-placeholder="Select one"
                                            name="course_id">
                                                <option label="Choose One"></option>
                                                @foreach ($courses as $course)
                                                <option value="{{ $course->id }}">{{ ucwords($course->course_title) }}</option>
                                                @endforeach
                                              </select>
                                            @error('course_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Question: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="question" placeholder="Enter question">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Enter first option: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="option1" placeholder="Please enter first option">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Enter second option: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="option2" placeholder="Please enter first option">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Answer: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="answer" placeholder="Please enter answer">
                                        </div>
                                       
                                        
                                            <div class="input-field col s12">
                                                <i class="waves-effect waves-light btn-large waves-input-wrapper" style=""><input type="submit" class="waves-button-input" value="Submit"></i>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>

@endsection