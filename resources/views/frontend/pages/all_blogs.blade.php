@extends('frontend.layouts.master')


@section('content')
<div class="page-content bg-white">
<div class="page-banner ovbl-dark" style="background-image:url({{ asset('images/banner/banner2.jpg')}});">
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
  <li>All Blogs</li>
</ul>
</div>
</div>


<div class="content-block">
<div class="section-area section-sp1">
<div class="container">
 <div class="row">
   <!-- Left part start -->
   <div class="col-lg-8">
     @foreach($blogs as $row)
     <div class="blog-post blog-md clearfix">
       <div class="ttr-post-media">
         <a href="#"><img src="{{asset('storage/blogs/' .$row->blogs_image)}}" alt=""></a>
       </div>
       <div class="ttr-post-info">
         <ul class="media-post">
           <li><a href="{{ url('blogs_details/'.$row->id.'/'.$row->blogs_slug) }}"><i class="fa fa-calendar"></i>{{$row->created_at}}</a></li>
           <!--<li><a href="#"><i class="fa fa-user"></i>By William</a></li>-->
         </ul>
         <h5 class="post-title"><a href="{{ url('blogs_details/'.$row->id.'/'.$row->blogs_slug)}}">{{$row->blogs_title}}</h5>
         <p>{{$row->short_description}}</p>
         <div class="post-extra">
           <a href="{{ url('blogs_details/'.$row->id.'/'.$row->blogs_slug) }}" class="btn-link">READ MORE</a>
          <!-- <a href="#" class="comments-bx"><i class="fa fa-comments-o"></i>05 Comment</a>-->
         </div>
       </div>
     </div>
     @endforeach
     <!-- Pagination start -->
     <div class="col-lg-12 m-b20">

         {{$data->links('frontend.partials.pagination')}}

     </div>
     <!-- Pagination END -->
   </div>
   <!-- Left part END -->
   <!-- Side bar start -->
   <div class="col-lg-4 sticky-top">
     <aside class="side-bar sticky-top">
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
                 <h6 class="post-title"><a href="{{ url('blogs_details/'.$row->id.'/'.$row->blogs_slug) }}">{{$row->blogs_title}}</a></h6>
               </div>
               <ul class="media-post">
                 <li><a href="#"><i class="fa fa-calendar"></i>{{$row->created_at}}</a></li>

               </ul>
             </div>
           </div>
           @endforeach

         </div>
       </div>

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
      <!-- <div class="widget widget_tag_cloud">
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







@endsection
