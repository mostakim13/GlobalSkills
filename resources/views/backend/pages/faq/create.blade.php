@extends('admin.admin_master')
@section('admin_dashboard_content')
@section('active')
   trainers
@endsection

<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">FAQ</h4>
    <ul class="db-breadcrumb-list">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
      <li>FAQ</li>
    </ul>
  </div>


  <!-- Card -->
  <div class="row" id="basic-table">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <h4 class="card-title">FAQ</h4>
            <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#FaqAdd"><i class="fas fa-plus-circle"></i></a>
             @include('backend.modals.faqaddmodal')
          </div>
        <div class="table table-responsive">
          <table id="user_list" class="table table-bordered">
            <thead>
              <tr>
                <th class="wd-10">SL</th>
                <th>Subject</th>
                <th>Description</th>
                <th class="wd-10">Video Url</th>
                <th>Image</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
               @foreach ($faqs as $row)

              <tr>
                <td>{{$loop->index+1}}</td>
                <td class="user_name">
                    {{$row->subject}}
                </td>
                <td>
                    <textarea name="" id="" cols="30" disabled rows="2">{!!$row->description !!}</textarea>
                </td>

                <td>
                    {{$row->video_url}}
                </td>
                <td>
                    <img src="{{asset( $row->image) }}" alt="">
                </td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#FaqEdit{{$row->id}}"><i class="fas fa-edit"></i></a>

                  <a  href="/admin/delete-faq/{{$row->id}}" id="delete"><i class="fas fa-trash"></i></a>
                      {{-- @include('backend.modals.trainereditmodal') --}}

                </td>




              </tr>

              @endforeach
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

    <!-- Modal -->

</div>




@endsection
