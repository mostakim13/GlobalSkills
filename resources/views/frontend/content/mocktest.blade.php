<div class="section-area section-sp2 popular-courses-bx">
          <div class="container">
    <div class="row">
      <div class="col-md-12 heading-bx left">
        <h2 class="title-head">Mock <span>Test</span></h2>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
      </div>
    </div>
    <div class="row">

    <div class="courses-carousel owl-carousel owl-btn-1 col-12 p-lr0">
      @php
        $courses = App\Models\Course::all();
      @endphp
      @foreach ($courses as $course)
      <div class="item">
        <div class="cours-bx">
          <div class="action-box">
            <img src="{{ asset("storage/courses/$course->course_image") }}" alt="">
            <a href="#" class="btn">Read More</a>
          </div>
          <div class="info-bx text-center">
            <h5><a href="{{ url('course/mock/test/',$course->id) }}">{{ $course->course_title }}</a></h5>
            <span>Programming</span>
          </div>
          
          
          <div class="cours-more-info">
            <div class="review">
              <a href="" class="btn btn-primary btn-sm">Start Practice Exam</a>
            </div>
            <div class="price">
              <del>$190</del>
              <h5>$120</h5>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    </div>

  </div>
</div>
<div class="text-center">
  <a href="{{route('courses')}}" class="btn">View All</a>
</div>
