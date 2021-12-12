<div class="section-area section-sp2">
          <div class="container">
    <div class="row">
      <div class="col-md-12 heading-bx left">
        <h2 class="title-head">Blogs<span></span></h2>

      </div>
    </div>
    <div class="recent-news-carousel owl-carousel owl-btn-1 col-12 p-lr0">
      <?php
      $blogs = App\Models\AdminBlog::all();

       ?>
      @foreach ($blogs as $row)
      <div class="item" >
        <div class="recent-news">
          <div class="action-box">
            <img src="{{asset('storage/blogs/' .$row->blogs_image)}}" alt="image"
            height="700"
            width="438">
          </div>
          <div class="info-bx">
            <ul class="media-post">
              <li><a href="#"><i class="fa fa-calendar"></i>{{$row->created_at}}</a></li>
            <!--  <li><a href="#"><i class="fa fa-user"></i></a></li>-->
            </ul>
            <h5 class="post-title"><a href="{{ url('blogs_details/'.$row->id.'/'.$row->blogs_slug) }}">{{Str::limit($row->blogs_title,18)}}</h5>
            <p>{{Str::limit($row->short_description,90)}}</p>
            <div class="post-extra">
              <a href="{{ url('blogs_details/'.$row->id.'/'.$row->blogs_slug) }}" class="btn-link">READ MORE</a>

            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<div class="text-center">
  <a href="{{route('all-blogs')}}" class="btn">View All</a>
</div>
