@extends('admin.admin_master')


@section('admin_dashboard_content')

    <div class="db-breadcrumb">
        <h4 class="breadcrumb-title">Course Details</h4>
        <ul class="db-breadcrumb-list">
            <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
            <li>{{$course->course_title}} </li>
        </ul>
    </div>


    <div class="row match-height">
        <!-- Base Nav starts -->
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">

                    <h4 class="card-title">{{$course->course_title}}</h4>
                </div>
                <div class="card-body">

                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/home/courses/course_details/course_info/{{$course->id}}">Course
                                Info</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" style="color:red;"
                               href="/admin/home/courses/course_details/course_curricullum/{{$course->id}}">Course
                                Curricullum</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Media</a>
                        </li>

                        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#SectionAddModal">Add
                            Section</a>
                        @include('backend.modals.section_addmodal')

                    </ul>
                </div>
            </div>
        </div>
        <!-- Base Nav ends -->
    </div>
    <br>
    <section id="accordion-hover">
        <div class="row">
            <div class="col-sm-12">
                <div class="card collapse-icon">
                    @if(count($course->sections) > 0)
                    @foreach($course->sections as $section)

                        <div class="card-body">
                            <div class="accordion" id="accordionExample{{$section->id}}" data-toggle-hover="true">
                                <div class="collapse-default">
                                    <div class="card">
                                        <div
                                            class="card-header"
                                            id="heading{{$section->id}}"
                                            data-toggle="collapse"
                                            role="button"
                                            data-target="#collapse{{$section->id}}"
                                            aria-expanded="true"
                                            aria-controls="collapse{{$section->id}}"
                                        >
                                            <span
                                                class="lead collapse-title collapse-hover-title">{{$section->section_name}}</span>
                                            <br>
                                            <span onclick="addLesson({{$section->id}})"><i
                                                    class="fas fa-file-upload addLesson"></i></span>
                                            @include('backend.modals.lesson_addmodal')
                                            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#SectionEditModal{{ $section->id }}"><i class="fas fa-edit"></i></a>
                                              <a class="btn btn-primary" href="{{ url('home/section/delete/'.$section->id) }}" id="delete"><i class="fas fa-trash"></i></a>
                                              @include('backend.modals.section_editmodal')

                                        </div>
                                        <div
                                            id="collapse{{$section->id}}"
                                            class="collapse show"
                                            aria-labelledby="heading{{$section->id}}"
                                            data-parent="#accordionExample{{$section->id}}"
                                        >
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>Course Name</th>
                                                            <th>Section Name</th>

                                                            <th>Lesson ID</th>

                                                            <th>Video Type</th>
                                                            <th>Vimeo ID</th>
                                                            <th>Lesson Title</th>
                                                            <th>Duration</th>
                                                            <th>Preview</th>
                                                            <th>Files</th>
                                                            <th>Action</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @if(count($section->lessons) > 0)
                                                        @foreach($section->lessons as $lesson)

                                                            <tr>
                                                                <td>
                                                                    {{$lesson->course->course_title}}
                                                                </td>
                                                                <td>

                                                                    {{$lesson->lesson_title}}
                                                                </td>
                                                                <td>

                                                                    {{$lesson->id}}
                                                                </td>
                                                                <td>
                                                                    {{$lesson->video_type}}

                                                                </td>
                                                                <td>
                                                                    {{$lesson->vimeo_id}}
                                                                </td>
                                                                <td>

                                                                    {{$lesson->lesson_title}}
                                                                </td>
                                                                <td>


                                                                </td>
                                                                <td>
                                                                    {{$lesson->preview}}
                                                                </td>
                                                                <td>


                                                                    {{$lesson->files}}
                                                                </td>
                                                                <td>
                                                                  <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#LessonEditModal{{ $lesson->id }}"><i class="fas fa-edit"></i></a>
                                                                  <a class="btn btn-danger" href="{{ url('home/lesson/delete/'.$lesson->id) }}" id="delete"><i class="fas fa-trash"></i></a>
                                                              </td>
                                                              @include('backend.modals.lesson_editmodal')


                                                            </tr>

                                                        @endforeach

                                                        @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script>
        function addLesson(id){
            $('#LessonAddModal').modal('show');
            $('#section_id').val(id);
        }

    </script>
@endpush
