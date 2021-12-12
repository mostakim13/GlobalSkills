@extends('admin.admin_master')


@section('admin_dashboard_content')






<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">Course Details</h4>
    <ul class="db-breadcrumb-list">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
      <li>{{$course->course_title}} </li>
    </ul>
  </div>
  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#CourseDetailsAddModal">Add Course Details</a>
  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#CourseDetailsUpdateModal">View Course Details</a>

  </div>
  <br/>


  <br>

  <div class="container">


  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#SectionAddModal">Add Section</a>
    </div>
    <br>
    <section id="accordion-hover">
      <div class="row">
        <div class="col-sm-12">
          <div class="card collapse-icon">

              @foreach($sections as $row)

            <div class="card-body">

              <div class="accordion" id="accordionExample{{$row->id}}" data-toggle-hover="true">
                <div class="collapse-default">





                  <div class="card">





                    <div
                      class="card-header"
                      id="heading{{$row->id}}"
                      data-toggle="collapse"
                      role="button"
                      data-target="#collapse{{$row->id}}"
                      aria-expanded="true"
                      aria-controls="collapse{{$row->id}}"
                    >
                      <span class="lead collapse-title collapse-hover-title">{{$row->section_name}}</span>
                      <br>
                      <a href="#"  data-toggle="modal" data-target="#LessonAddModal"><i class="fas fa-file-upload"></i></a>
                      <a href="#"><i class="fas fa-edit"></i></a>
                      <a href="#"><i class="fas fa-trash"></i></a>

                    </div>











                    <div
                      id="collapse{{$row->id}}"
                      class="collapse show"
                      aria-labelledby="heading{{$row->id}}"
                      data-parent="#accordionExample{{$row->id}}"
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
                                <th>Youtube Url</th>
                                <th>Lesson Title</th>
                                <th>Duration</th>
                                <th>Preview</th>
                                <th>Files</th>

                              </tr>
                            </thead>
                            <tbody>




                            @foreach($lessons as $lesson)
                            <?php
                              $lessons = App\Models\Lesson::where('course_id', $lessons)->get();


                            ?>


                              <tr>
                                <td>
                                    {{$lesson->course->course_title}}
                                </td>
                                <td>

                                    {{$lesson->section->section_name}}
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
                                <td>{{$lesson->youtube_url}}</td>
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






                              </tr>

                                @endforeach





                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  @endforeach










                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </section>









   <!-- Course Detailks add modal start-->
  @include('backend.modals.course_details_addmodal')
  <!-- Course Detailks add modal End-->


  <!--  Add Section Modal start-->

  @include('backend.modals.section_addmodal')


  @include('backend.modals.section_editmodal')


  @include('backend.modals.lesson_addmodal')

  @include('backend.modals.course_details_updatemodal')

<!--  Add Section Modal End-->

  <!-- Card -->









<script src="{{asset('admin/js/components-collapse.js')}}"></script>


@endsection
