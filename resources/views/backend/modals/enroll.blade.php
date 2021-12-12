<div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{ Form::open(['id'=>'course_enroll', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}
            <div class="modal-body" id="modalBody">
                <div class="form-group">
                    <label for="custom select">Select Course</label>
                    {{Form::hidden('user_id',null,['id'=>'user_id'])}}
                    {!! Form::select('course_id',$data['course'],null, ['class' =>
                    'form-field select2Me', 'id'=>'course_id','onchange'=>'coursePrice()']) !!}
                    {{--<select class="form-control" name="course_id">
                        <option label="Choose category"></option>
                        <?php foreach ($courses as $course): ?>
                        <option value="{{$course->id}}">{{$course->course_title}}</option>

                        <?php endforeach; ?>

                    </select>--}}
                </div>
                <div class="form-group">
                    <label for="regualr_price">Price</label>
                    {!! Form::text('regular_price',null, ['class' =>
                    'form-control', 'id'=>'regular_price']) !!}

                </div>
                <div class="form-group">
                    <label for="access">Access</label>
                    <input type="number" class="form-control" name="access" aria-describedby="access"
                           placeholder="Enter Access">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{Form::submit('Enroll', ['class'=>'btn btn-success'])}}
            </div>
            {{ Form::close() }}
        </div>

    </div>
</div>
