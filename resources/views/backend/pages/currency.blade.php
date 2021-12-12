@extends('admin.admin_master')


@section('admin_dashboard_content')






<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">Currency</h4>
    <ul class="db-breadcrumb-list">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
      <li>Currency</li>
    </ul>
  </div>
  @if(Session::has('currency_deleted'))
  <div class="alert alert-danger" role="alert">

    <div class="alert-body">
      {{Session::get('currency_deleted')}}
    </div>
  </div>
  @elseif(Session::has('currency_added'))
  <div class="alert alert-success" role="alert">

    <div class="alert-body">
      {{Session::get('currency_added')}}
    </div>
  </div>
  @elseif(Session::has('currency_updated'))
  <div class="alert alert-success" role="alert">

    <div class="alert-body">
      {{Session::get('currency_updated')}}
    </div>
  </div>

  @endif
  <!-- Card -->

  <div class="row" id="basic-table">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Currency</h4>
       <a href="#"  data-toggle="modal" data-target="#CurrencyAddModal" class="btn btn-success"><i class="fas fa-plus"></i></a>
        @include('backend.modals.currencyaddmodal')
        </div>


        <!-- Modal -->

        <div class="table table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Currency Code</th>

                <th>Exchange Rate</th>
                <th>Status</th>

                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

              @foreach($currencies as $row)
              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$row->currency_code}}</td>
                <td>{{$row->exchange_rate}}</td>
                <td>
                  @if($row->status==1)
                  Active

                  @else
                  Inactive
                  @endif

                </td>



                <td>
                  <a href="#" data-toggle="modal" data-target="#CurrencyEditModal{{$row->id}}"><i class="fas fa-edit"></i></a>
                  <a href="/admin/home/currency/delete{{$row->id}}"><i class="fas fa-trash"></i></a>
                    @include('backend.modals.currencyeditmodal')
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
<script>
  $(function(){
    'use strict';

    $('#currency').DataTable({
      responsive: true,
      language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ ',
      }
    });


  });
</script>





@endsection
