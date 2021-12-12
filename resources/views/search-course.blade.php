<style>
    .search-item-design{
        padding-top: 10px;
    }
   .design-li{
        list-style: none;
        padding: 0 20px;
    }
    .design-li:hover{
        background:#DA9F0D;
        cursor: pointer;
    }
    .design-li a:hover{
       color:white;
    }
</style>

<ul class="search-item-design">
    @forelse ($course as $item)
    <a href="{{ url('home/course_details/'.$item->id.'/'.$item->elearning_slug) }}">
        <li class="design-li">
            <img src="{{asset("storage/courses/$item->course_image")}}" alt="" height="40px;" width="40px;">
            <strong style="color: white">{{ $item->course_title }}</strong> <hr>
        </li>
    </a>
    @empty
        <div style="color:white; padding:0 20px;">No E-Learning Course Found</div>
    @endforelse
</ul>

<ul class="search-item-design">
    @forelse ($classroom as $item)
    <a href="{{ url('home/classroom/course_details/'.$item->id.'/'.$item->classroom_slug) }}">
        <li class="design-li">
            <img src="{{asset("storage/Classroom courses/$item->classroom_course_image")}}" alt="" height="40px;" width="40px;">
            <strong style="color: white">{{ $item->classroom_course_title }}</strong> <hr>
        </li>
    </a>
    @empty
        <div style="color:white; padding:0 20px;">No Classroom Course Found</div>
    @endforelse
</ul>
