@extends('admin.admin_master')


@section('admin_dashboard_content')

<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">Blogs</h4>
    <ul class="db-breadcrumb-list">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
      <li>Blogs</li>
    </ul>
  </div>
  <!-- Card -->

  <div class="row" id="basic-table">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Blogs</h4>
          <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#BlogsAddModal"><i class="fas fa-plus-circle"></i></a>
          @include('backend.modals.blogsaddmodal')
        </div>

        <!-- Modal -->
        <div class="table table-responsive">
          <table class="table table-bordered" id="blog_list">
            <thead>
              <tr>
                <th>
                  No
                </th>
                <th>Blogs Title</th>
                <th>Short Description</th>

                <th>Blogs Images</th>




                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach($blogs as $row)

              <tr>

                <td><span class="font-weight-bold"></span>{{$loop->index+1}}</td>
                <td><span class="font-weight-bold">

                    {{$row->blogs_title}}
                </span></td>
                <td>
                    {{$row->short_description}}

                </td>
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
                        src="{{asset('storage/blogs/' .$row->blogs_image)}}"
                        alt="image"
                        height="50"
                        width="50"

                      />
                    </div>
                  </div>
                  </td>

                <td>
                    {{$row->created_at}}

                </td>

                <td> {{$row->updated_at}}

              </td>




                <td>
                  <a href="/admin/home/blogs/details/{{$row->id}}"><i class="fas fa-file-upload"></i></a>
                  <a href="#" data-toggle="modal" data-target="#BlogsEditModal{{$row->id}}"><i class="fas fa-edit"></i></a>



                  <a id="delete" href="/admin/home/deleteBlog/{{$row->id}}"><i class="fas fa-trash"></i></a>
                  @include('backend.modals.blogseditmodal')

                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
        <div class="col-lg-12 m-b20">

            {{$blog->links('frontend.partials.pagination')}}

        </div>
      </div>
    </div>
  </div>

</div>
<script>
  $(function(){
    'use strict';

    $('#blog_list').DataTable({
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
