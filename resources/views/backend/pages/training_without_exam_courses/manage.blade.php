@extends('admin.admin_master')


@section('admin_dashboard_content')






<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">Manage Training Course Without Exam</h4>
    <ul class="db-breadcrumb-list">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
      <li>Manage Training Course Without Exam</li>
    </ul>
  </div>
  <!-- Card -->

  <div class="row" id="basic-table center">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Manage Training Course Without Exam</h4>
          <a href="javascript:void(0)" id="createNewCourse" class="btn btn-primary" data-toggle="modal" data-target="#TrainingCourseAddModal">Add</a>
          @include('backend.modals.training_courseaddmodal')

        </div>
        <div class="card-body">
          <div class="table table-responsive">
          <table class="table table-bordered data-table">
            <thead>
              <tr>

                <th>Main Category</th>
                <th>Course Category</th>
                <th>Course Title</th>
                <th>Image</th>
                <th>Training Fee</th>
                <th>Short Description</th>
                <th>Course Description</th>
                <th>Learning Outcomes</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>

          </table>
        </div>

        </div>


        <!-- Modal -->


      </div>
    </div>
  </div>

</div>
@push('scripts')
<script type="text/javascript">


$('#saveBtn').click(function (e) {
    e.preventDefault();
    $(this).html('Save');
    $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
     });

    $.ajax({
      data: $('#TrainingCourseAddForm').serialize(),
      url: "{{ route('store-training-course') }}",
      type: "POST",
      //dataType: 'json',
      success: function (data) {

          $('#store-training-course').trigger("reset");
          $('#TrainingCourseAddModal').modal('hide');
          table.draw();

      },
      error: function (data) {
          console.log('Error:', data);
          $('#saveBtn').html('Save Changes');
      }
  });
});
</script>
@endpush
<script type="text/javascript">
$(function () {
  $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
   });

   var table = $('.data-table').DataTable({
       processing: true,
       serverSide: true,
       ajax: "{{ route('store-training-course') }}",
       columns: [
         {data: 'main_category_id', name: 'main_category_id'},
          {data: 'course_category_id', name: 'course_category_id'},
           {data: 'course_title', name: 'course_title'},
           {data: 'image', name: 'image'},
           {data: 'training_fee', name: 'training_fee'},
           {data: 'short_description', name: 'short_description'},
           {data: 'course_description', name: 'course_description'},
           {data: 'learning_outcomes', name: 'learning_outcomes'},
           {data: 'status', name: 'status'},
           {data: 'action', name: 'action', orderable: false, searchable: false},
       ]
   });
   $('#createNewCourse').click(function () {
       $('#saveBtn').val("create-course");
       $('#id').val('');
       $('#TrainingCourseAddForm').trigger("reset");

       $('#TrainingCourseAddModal').modal('show');
   });





 });
</script>





@endsection
