<div class="section-area section-sp2">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center heading-bx">
        <h2 class="title-head m-b0">Upcoming <span>Events</span></h2>

      </div>
    </div>
    <div class="row">
    <div class="upcoming-event-carousel owl-carousel owl-btn-center-lr owl-btn-1 col-12 p-lr0  m-b30">
      <?php
      $events = App\Models\AdminEvent::all();

       ?>
      @foreach ($events as $row)
      <div class="item">
        <div class="event-bx">
          <div class="action-box">
            <a href="/event_details/{{$row->id}}">
            <img src="{{asset('storage/events/' .$row->event_image)}}"  alt="image"
            height="700"
            width="438"></a>
          </div>
          <div class="info-bx d-flex">
            <div>
              <div class="event-time">
                <div class="event-date">{{$row->date}}</div>
                <div class="event-month">{{$row->month}}</div>
              </div>
            </div>
            <div class="event-info">
              <h4 class="event-title"><a href="/event_details/{{$row->id}}">{{$row->event_title}}</a></h4>

              <p>{{$row->description}}</p>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>
    </div>
    <div class="text-center">
      <a href="{{route('event')}}" class="btn">View All Event</a>
    </div>
  </div>
</div>
