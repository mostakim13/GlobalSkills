@extends('admin.admin_master')


@section('admin_dashboard_content')






<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">Blogs</h4>
    <ul class="db-breadcrumb-list">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
      <li>Blogs Details</li>
    </ul>
  </div>
  <!-- Card -->
  <div class="row match-height">
    <!-- Base Nav starts -->
    <div class="col-md-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Blog Details View</h4>
              <a class="float-right" href="{{route('manage-blogs')}}"><i class="fa fa-home fa-2x"></i></a>
                <a class="float-right" href="#" data-toggle="modal" data-target="#BlogDetailsEditModal"><i class="fa fa-edit fa-2x"></i></a>
              
        </div>
        <div class="card-body">

          <div class="table table-responsive">
            <table class="table table-bordered" id="course_table">
              <thead>
                <tr>
                  <th>
                    Blog Name
                  </th>
                  <th>Blog Banner Image</th>
                  <th>Blog Content Image 1</th>
                  <th>Blog Content Image 2</th>
                  <th>Youtube Url</th>
                  <th>Sub Title</th>
                  <th>Sub Title Description</th>
                  <th>Blog Content Details</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>

                  @foreach($blog_details as $row)
                <tr>

                  <td>{{$row->admin_blog->blogs_title}} </td>
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
                            src="{{asset("storage/Blogs Banner/$row->blog_banner_image")}}"




                            alt="image"
                            height="50"
                            width="50"

                          />
                        </div>


                      </div></td>
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
                                src="{{asset("storage/Blogs Banner/$row->blog_content_img1")}}"

                              alt="image"
                              height="50"
                              width="50"

                            />
                          </div>


                        </div></td>
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
                                src="{{asset("storage/Blogs Banner/$row->blog_content_img2")}}"

                                alt="image"
                                height="50"
                                width="50"

                              />
                            </div>


                          </div></td>



                  <td>

                    <span class="font-weight-bold">  {{$row->youtube_url_1}}</span>
                  </td>


                  <td>

                    <span class="font-weight-bold">{{$row->sub_title}} </span>
                  </td>
                  <td>

                    <span class="font-weight-bold">{!!$row->sub_title_description!!} </span>
                  </td>

                  <td>{!!$row->blog_details_content!!}</td>
                  <td>








                  </td>







                </tr>
                @endforeach

              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
    <!-- Base Nav ends -->


  </div>


</div>

@endsection
