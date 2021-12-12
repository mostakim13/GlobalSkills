@extends('admin.admin_master')


@section('admin_dashboard_content')






<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">Manage System</h4>
    <ul class="db-breadcrumb-list">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
      <li>Manage Main System</li>
    </ul>
  </div>
  <!-- Card -->

  <div class="row" id="basic-table center">
    <div class="col-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">System</h4>
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#SystemAddModal">Add</a>
          @include('backend.modals.systemaddmodal')
        </div>


        <!-- Modal -->

        <div class="table table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Vat</th>

                <th>Tax</th>

                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($vat_taxes as $row)

              <tr>
                <td></td>
                <td>{{$row->vat}}%</td>
                <td>

          {{$row->tax}}  %
                </td>



                <td>
                  <a href="#"><i class="fas fa-edit"></i></a>
                  <a href="#"><i class="fas fa-trash"></i></a>

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
