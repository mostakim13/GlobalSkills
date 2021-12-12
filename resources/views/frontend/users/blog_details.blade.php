@extends('frontend.layouts.master')


@section('content')


<div class="content-block">
<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner2.jpg);">
        <div class="container">
            <div class="page-banner-entry">
              <br/>
              <br/>

    </div>
        </div>
    </div>
<!-- Breadcrumb row -->
<div class="breadcrumb-row">
  <div class="container">
    <ul class="list-inline">
      <li><a href="{{route('home')}}">Home</a></li>
      <li>Blog Details</li>
    </ul>
  </div>
</div>
<!-- Breadcrumb row END -->
    <div class="content-block">
  <div class="section-area section-sp1">
    <div class="container">
      <div class="row">
        <!-- Left part start -->
        <div class="col-lg-8 col-xl-8">
          <!-- blog start -->
          <div class="recent-news blog-lg">
            <div class="action-box blog-lg">
              <img src="{{asset("storage/Blogs Banner/$blog_details->blog_banner_image")}}" alt="">
            </div>
            <div class="info-bx">
              <ul class="media-post">
                <li><a href="#"><i class="fa fa-calendar"></i>{{$blogs->created_at}}</a></li>

              </ul>
              <h1 class="post-title" style="color:#ca2128;">{{$blogs->blogs_title}}</h1>
              <p>{{$blogs->short_description}}</p>

              <h5 class="post-title"style="color:#ca2128;">{{$blog_details->sub_title}}</h5>
            {!!$blog_details->sub_title_description!!}
              <div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>
              <div class="row">
                <div class="col-lg-6 col-xl-6">
                  <div class="service-bx">
                    <div class="action-box">
                    <iframe width="350" height="210" src="https://www.youtube.com/embed/{{$blog_details->youtube_url_1}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                    </div>

                  </div>

                </div>
                <div class="col-lg-6 col-xl-6">
                  <div class="service-bx">
                    <div class="action-box">
                      <img src="{{asset("storage/Blogs Banner/$blog_details->blog_content_img1")}}" alt="">
                    </div>

                  </div>

                </div>

              </div>
                  <div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>

                                {!!$blog_details->blog_details_content!!}

                      <div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>
            <!--  <div class="widget_tag_cloud">
                <h6>TAGS</h6>
                <div class="tagcloud">
                  <a href="#">Design</a>
                  <a href="#">User interface</a>
                  <a href="#">SEO</a>
                  <a href="#">WordPress</a>
                  <a href="#">Development</a>
                  <a href="#">Joomla</a>
                  <a href="#">Design</a>
                  <a href="#">User interface</a>
                  <a href="#">SEO</a>
                  <a href="#">WordPress</a>
                  <a href="#">Development</a>
                  <a href="#">Joomla</a>
                  <a href="#">Design</a>
                  <a href="#">User interface</a>
                  <a href="#">SEO</a>
                  <a href="#">WordPress</a>
                  <a href="#">Development</a>
                  <a href="#">Joomla</a>
                </div>
              </div>-->
              <div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>
                <!--<h6>SHARE </h6>-->
              <!--  <ul class="list-inline contact-social-bx">
                  <li><a href="#" class="btn outline radius-xl"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#" class="btn outline radius-xl"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#" class="btn outline radius-xl"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#" class="btn outline radius-xl"><i class="fa fa-google-plus"></i></a></li>
                </ul>-->
            <!--<div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>-->
            </div>
          </div>


          <!-- Comment section -->


          <!-- Comment section -->




          <!-- blog END -->
        </div>
        <!-- Left part END -->
        <!-- Side bar start -->
        <div class="col-lg-4 col-xl-4">
          <aside  class="side-bar sticky-top">
            <div class="widget">
              <h6 class="widget-title">Search</h6>
              <div class="search-bx style-1">
                <form role="search" method="post">
                  <div class="input-group">
                    <input name="text" class="form-control" placeholder="Enter your keywords..." type="text">
                    <span class="input-group-btn">
                      <button type="submit" class="fa fa-search text-primary"></button>
                    </span>
                  </div>
                </form>
              </div>
            </div>
            <div class="widget recent-posts-entry">
              <h6 class="widget-title">Recent Posts</h6>
              <div class="widget-post-bx">
                @foreach($lts_blogs as $row)
                <div class="widget-post clearfix">
                  <div class="ttr-post-media"> <img src="{{asset('storage/blogs/' .$row->blogs_image)}}" width="200" height="143" alt=""> </div>
                  <div class="ttr-post-info">
                    <div class="ttr-post-header">
                      <h6 class="post-title"><a href="{{ url('blogs_details/'.$row->id.'/'.$row->blogs_slug)}}">{{$row->blogs_title}}</a></h6>
                    </div>
                    <ul class="media-post">
                      <li><a href="#"><i class="fa fa-calendar"></i>{{$row->created_at}}</a></li>

                    </ul>
                  </div>
                </div>
                @endforeach

              </div>
            </div>
          <!--  <div class="widget widget-newslatter">
              <h6 class="widget-title">Newsletter</h6>
              <div class="news-box">
                <p>Enter your e-mail and subscribe to our newsletter.</p>
                <form class="subscription-form" action="http://educhamp.themetrades.com/demo/assets/script/mailchamp.php" method="post">
                  <div class="ajax-message"></div>
                  <div class="input-group">
                    <input name="dzEmail" required="required" type="email" class="form-control" placeholder="Your Email Address"/>
                    <button name="submit" value="Submit" type="submit" class="btn black radius-no">
                      <i class="fa fa-paper-plane-o"></i>
                    </button>
                  </div>
                </form>
              </div>
            </div>-->
            <div class="widget widget_gallery gallery-grid-4">
              <h6 class="widget-title">Our Gallery</h6>
              <ul>
                <li><a href="{{ asset('images/gallery/1.jpg')}}" class="magnific-anchor"><img src="{{ asset('images/gallery/1.jpg')}}" alt=""></a></li>
                <li><a href="{{ asset('images/gallery/2.jpg')}}" class="magnific-anchor"><img src="{{ asset('images/gallery/2.jpg')}}" alt=""></a></li>
                <li><a href="{{ asset('images/gallery/3.jpg')}}" class="magnific-anchor"><img src="{{ asset('images/gallery/3.jpg')}}" alt=""></a></li>
                <li><a href="{{ asset('images/gallery/4.jpg')}}" class="magnific-anchor"><img src="{{ asset('images/gallery/4.jpg')}}" alt=""></a></li>
                <li><a href="{{ asset('images/gallery/5.jpg')}}" class="magnific-anchor"><img src="{{ asset('images/gallery/5.jpg')}}" alt=""></a></li>
                <li><a href="{{ asset('images/gallery/6.jpg')}}" class="magnific-anchor"><img src="{{ asset('images/gallery/6.jpg')}}" alt=""></a></li>
              </ul>
            </div>
          <!--  <div class="widget widget_tag_cloud">
              <h6 class="widget-title">Tags</h6>
              <div class="tagcloud">
                <a href="#">Design</a>
                <a href="#">User interface</a>
                <a href="#">SEO</a>
                <a href="#">WordPress</a>
                <a href="#">Development</a>
                <a href="#">Joomla</a>
                <a href="#">Design</a>
                <a href="#">User interface</a>
                <a href="#">SEO</a>
                <a href="#">WordPress</a>
                <a href="#">Development</a>
                <a href="#">Joomla</a>
                <a href="#">Design</a>
                <a href="#">User interface</a>
                <a href="#">SEO</a>
                <a href="#">WordPress</a>
                <a href="#">Development</a>
                <a href="#">Joomla</a>
              </div>
            </div>-->
          </aside>
        </div>
        <!-- Side bar END -->
      </div>
    </div>
  </div>
    </div>
</div>

<!-- Content END-->


</div>

@endsection
