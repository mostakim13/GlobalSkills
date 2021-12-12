@extends('admin.admin_master')


@section('admin_dashboard_content')






<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">Our Accreditation</h4>
    <ul class="db-breadcrumb-list">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
      <li>Our Accreditation</li>
    </ul>
  </div>
  <!-- Card -->

  <div class="row" id="basic-table">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Our Accreditation</h4>
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#AccreditationAddModal"><i class="fas fa-plus-circle"></i></a>
            @include('backend.modals.accreditationaddmodal')
        </div>
        @if(Session::has('accreditation_added'))
        <div class="alert alert-success" role="alert">

          <div class="alert-body">
            {{Session::get('accreditation_added')}}
          </div>
        </div>

        @elseif(Session::has('accreditation_deleted'))
        <div class="alert alert-danger" role="alert">

          <div class="alert-body">
            {{Session::get('accreditation_deleted')}}
          </div>
        </div>

        @endif


        <!-- Modal -->

        <div class="table table-responsive">
          <table class="table table-bordered" id="course_table">
            <thead>
              <tr>
                <th>ID</th>
                <th>
                  Name
                </th>
                <th>Images</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach($accreditations as $row)

              <tr>
                <td>{{$row->id}}</td>

                <td>{{$row->name}}</td>

                <td>
                  <div class="avatar-group">
                    <div
                      data-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-placement="top"
                      title=""
                      class="avatar pull-up my-0"
                      data-original-title=""
                    >
                      <img
                        src="{{asset("storage/Accreditation/$row->accreditation_image")}}"
                        alt="image"
                        height="50"
                        width="50"

                      />
                    </div>


                  </div>





                </td>


                <td>


                  <a id="delete" href="/admin/home/accreditation/delete/{{$row->id}}"><i class="fas fa-trash"></i></a>

                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

</div>
@endsection
