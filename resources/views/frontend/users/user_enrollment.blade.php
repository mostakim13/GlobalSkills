@extends('frontend.layouts.master')


@section('content')
<style>
    .active{
    color:red;
    font-size:15px;
    }
</style>

    <div class="page-banner ovbl-dark" style="background-image:url({{ asset('images/banner/banner2.jpg')}});">
        <div class="container">
            <div class="page-banner-entry">
                <br/><br/>

            </div>
        </div>
    </div>

    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="#">Courses</a></li>
                <li>{{$course->course_title}}</li>
            </ul>
        </div>
    </div>

    <div class="content-block">
        <!-- About Us -->
        <div class="section-area section-sp1">
            <div class="container">
                <div class="row d-flex flex-row-reverse">
                    <div class="col-lg-4 col-md-4 col-sm-12 m-b30">
                        <div class="m-b30" id="curriculum">
                            <section id="accordion-hover">
                                <div class="row">
                                    <div class="col-lg-12 col-md-4 col-sm-12 m-b30">
                                        <div class="card collapse-icon">
                                          <div class="card-header">
                              <h4 class="card-title">Curriculum</h4>
                              <i class="ti-time"></i> <span class="label">Total Duration</span> <span class="value">
                                  <strong class="pull-right">
                                   @php
                                   $total_duration = $data;
                                   $H = floor($total_duration / 3600);
                                   $i = ($total_duration / 60) % 60;
                                   $s = $total_duration % 60;
                                 if($H==NULL)
                                 {
                                 echo sprintf("%02d:%02d Hours", $i, $s);
                                 }
                                 else
                                 {
                                 echo sprintf("%02d:%02d:%02d Hours", $H, $i, $s);
                                 }
                                 @endphp
                                </strong>
                                 </span>
                          </div>
                                            <div class="card-body">
                                              <div class="accordion" id="accordionExample{{$section->id}}"
                               data-toggle-hover="true">
                           <div class="collapse-default">
                               @if(count($course->sections) > 0)
                                   @foreach($course->sections as $section)

                                       <div class="card">
                                           <div
                                               class="card-header"
                                               id="heading{{$section->id}}"
                                               data-toggle="collapse"
                                               role="button"
                                               data-target="#collapse{{$section->id}}"
                                               aria-expanded="true"
                                               aria-controls="collapse{{$section->id}}"
                                           >
                                               <h6 class="curriculum-list"
                                                   style="color:#ca2128;">{{$loop->index+1}}. {{$section->section_name}}
                                                   <p class="pull-right"><i class="ti-time"></i>
                                                       <span class="value">
                                                        @php
                                                           $section_sum=App\Models\Lesson::where('section_id',$section->id)->sum('duration');
                                                           $total_ = $section_sum;
                                                           $Hours = floor($total_ / 3600);
                                                           $Minuites = ($total_ / 60) % 60;
                                                           $Seconds = $total_ % 60;
                                                           echo sprintf("%02d:%02d:%02d Hours", $Hours, $Minuites, $Seconds);
                                                        @endphp
                                                       </span>
                                                     </p>
                                               </h6>
                                           </div>

                                           <div
                                               id="collapse{{$section->id}}"
                                               class="collapse show"
                                               aria-labelledby="heading{{$section->id}}"
                                               data-parent="#accordionExample{{$section->id}}"
                                                >
                                   <div class="card-body">
                                       <div id="thumbs">
                                           <ul>
                       @if(count($section->lessons) > 0)
                           @foreach($section->lessons as $lesson)
                           @if($lesson->youtube_url)
                           <?php
                           $video_url=$lesson->youtube_url;
                            $api_key='AIzaSyDthwUfyzKUC2Nd_JEvPkLJjG-_ufy_w-E';
                            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video_url, $match);
                               $video_url = $match[1];
                               $api_url='https://www.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id='.$video_url.'&key='.$api_key;
                               $data=json_decode(file_get_contents($api_url));
                               $time=$data->items[0]->contentDetails->duration;
                           ?>
                           @endif
                               <ul>

                                   @if($lesson->video_type=="Youtube")
                                   <ul id="ulActive">
                                   <a class="venobox" data-autoplay="true" data-vbtype="video" href="{{ $lesson->youtube_url }}" data-gall="enrollGallery">
                                       <strong><i  class="fas fa-play-circle" title="Play"></i></strong> <strong>{{$lesson->lesson_title}}</strong>
                                     </a>
                                   </ul>
                                     @else
                                     <ul id="ulActive">
                                     <a class="video-play1" data-video-id="{{ $lesson->vimeo_id }}" data-channel="vimeo" href="#">
                                       <strong><i  class="fas fa-play-circle" title="Play"></i></strong> {{$lesson->lesson_title}}</strong>
                                   </a>
                                     </ul>

                                     @endif
                                     @if($lesson->youtube_url)
                                     <i class="far fa-clock"></i>
                                     @php
                                     $timeFormat = new DateTime('1970-01-01');
                                    $timeFormat->add(new DateInterval($time));
                                    if (strlen($time)>8)
                                    {
                                        echo $timeFormat->format('H:i:s');
                                }   else {
                                    echo $timeFormat->format('H:i:s');
                                }
                                @endphp
                                @endif
                                     @if($lesson->files)
                                     <br>
                                     <i class="fas fa-file-pdf" style="color: red"></i> <a href="{{asset("storage/courses/admin/courses/files/$lesson->files")}}" target="_blank" title="{{$lesson->lesson_title}} File">{{$lesson->lesson_title}} File</a>
                                     @else
                                     @endif
                                     <br>

                               </ul>
                           @endforeach
                       @endif
                   </ul>
               </div>

           </div>
       </div>
   </div>

   @endforeach
                               @endif
                           </div>
                       </div>


                                                <br>
                                                @if($course->accredation_name)
                                                <a class="btn btn-success align-center" data-toggle="modal" data-target="#SubmitEvolution" href="#">Submit To Download Certificate</a>
                                                @include('frontend.modals.submitevolutionmodal')
                                                @else
                                                <a class="btn btn-success align-center" data-toggle="modal" data-target="#SubmitEvolution" href="#">Submit To Download Certificate</a>
                                                  @include('frontend.modals.submitevolutionmodal')
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div class="courses-post">
                          <div class="video-bx">
              <img src="{{asset("storage/courses/$course->course_image")}}" alt=""/>

              @if(count($course->sections) > 0)
              @foreach($course->sections as $section)
                  @if(count($section->lessons) > 0)
                  @foreach($section->lessons as $lesson)
                  @if($course->video_type==0)
                  <ul>

                      <a class="venobox popup-youtube video" data-autoplay="true" data-vbtype="video" href="{{ $course->preview_id }}"><i class="fa fa-play"></i></a>

                  </ul>
                  @else
                  <ul>
                      <a class="popup-youtube video video-play1" data-video-id="{{ $course->preview_id }}" data-channel="vimeo" href="#">
                          <i class="fa fa-play"></i>
                          </a>
                  </ul>

                    @endif
              @endforeach
              @endif
              @endforeach
              @endif

                     </div>

                            <div class="ttr-post-info">
                                <div class="ttr-post-title">
                                    <h2 class="post-title">{{$course->course_title}}</h2>
                                </div>
                                <div class="ttr-post-text">
                                    {!!$course->course_details->short_description!!}
                                </div>
                            </div>
                        </div>
                        <div class="courese-overview" id="overview">
                            <h4>Overview</h4>
                            <div class="row">
                                <div class="col-md-12 col-lg-4">
                                    <ul class="course-features">
                                      <!--  <li><i class="ti-book"></i> <span class="label">Lectures</span> <span
                                                class="value">8</span></li>-->
                                        <li><i class="ti-help-alt"></i> <span class="label">Quizzes</span> <span
                                                class="value">{{$course->course_details->quiz}}</span></li>
                                    <!--    <li><i class="ti-time"></i> <span class="label">Duration</span> <span
                                                class="value">60 hours</span></li>-->
                                        <li><i class="ti-stats-up"></i> <span class="label">Skill level</span> <span
                                                class="value">{{$course->course_details->skill}}</span></li>
                                        <li><i class="ti-smallcap"></i> <span class="label">Language</span> <span
                                                class="value">{{$course->course_details->language}}</span></li>
                                    <!--    <li><i class="ti-user"></i> <span class="label">Students</span> <span
                                                class="value">32</span></li>-->
                                    <!--    <li><i class="ti-check-box"></i> <span class="label">Assessments</span> <span
                                                class="value">Yes</span></li>-->
                                    </ul>
                                </div>
                                <div class="col-md-12 col-lg-8">
                                    <h5 class="m-b5">Course Description</h5>
                                    {!!$course->course_details->course_description!!}
                                    <h5 class="m-b5">Certification</h5>
                                    <p>{{$course->course_details->certification}}</p>
                                    <h5 class="m-b5">Learning Outcomes</h5>
                                    <ul class="list-checked primary">
                                        {!!$course->course_details->learning_outcomes!!}

                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="" id="instructor">
                        <h4>Instructor</h4>

                        @foreach ($trainer as $item)

                        <div class="instructor-bx">
                          <div class="instructor-author">
                            <img src="{{asset($item->image)}}" alt="">
                          </div>
                          <div class="instructor-info">
                            <h6>{{$item->name}}</h6>
                            <span>{{ $item->designation }}</span>
                            <ul class="list-inline m-tb10">
                              <li><a href="{{ $item->facebook_profile }}" class="btn sharp-sm facebook"><i class="fab fa-facebook"></i></a></li>
                              <li><a href="{{ $item->linkdin_profile }}" class="btn sharp-sm linkedin"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                            <p class="m-b0">{!! $item->biography !!}</p>
                          </div>
                        </div>
                        @endforeach

                      </div>


                      <div class="" id="reviews">
                        <h4>Reviews</h4>

                        <div class="review-bx">
                          <div class="product-add-review">
                            <h4 class="title">Write your own review</h4>
                            <div class="review-table">
                              <div class="table-responsive">
                                <form role="form" class="cnt-form" action="{{ route('store.review') }}" method="post">
                                <table class="table" >
                                  @csrf
                                  <input type="hidden" name="course_id" value="{{$course->id}}">
                                  <thead>
                                    <tr>
                                     <th class="cell-label">&nbsp;</th>
                                     <th><i class="fa fa-star" style="color: red"></i></th>
                                     <th><i class="fa fa-star" style="color: red"></i>
                                       <i class="fa fa-star"  style="color: red"></i></th>
                                     <th><i class="fa fa-star" style="color: red"></i>
                                       <i class="fa fa-star" style="color: red"></i>
                                       <i class="fa fa-star" style="color: red"></i></th>
                                     <th><i class="fa fa-star" style="color: red"></i>
                                       <i class="fa fa-star" style="color: red"></i>
                                       <i class="fa fa-star" style="color: red"></i>
                                       <i class="fa fa-star" style="color: red"></i></th>
                                     <th><i class="fa fa-star" style="color: red"></i>
                                       <i class="fa fa-star" style="color: red"></i>
                                       <i class="fa fa-star" style="color: red"></i>
                                       <i class="fa fa-star" style="color: red"></i>
                                       <i class="fa fa-star" style="color: red"></i></th>
                                   </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td class="cell-label">Rating</td>
                                      <td><input type="radio" name="rating" class="radio" value="1"></td>
                                      <td><input type="radio" name="rating" class="radio" value="2"></td>
                                      <td><input type="radio" name="rating" class="radio" value="3"></td>
                                      <td><input type="radio" name="rating" class="radio" value="4"></td>
                                      <td><input type="radio" name="rating" class="radio" value="5"></td>
                                    </tr>
                                    @error('rating')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror

                                  </tbody>
                                </table><!-- /.table .table-bordered -->
                              </div><!-- /.table-responsive -->
                            </div><!-- /.review-table -->

                            <div class="review-form">
                              <div class="form-container">


                                  <div class="row">

                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                        <textarea class="form-control txt txt-review" id="exampleInputReview" name="comment" rows="4" placeholder=""></textarea>
                                        @error('comment')
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                      </div><!-- /.form-group -->
                                    </div>
                                  </div><!-- /.row -->

                                  <div class="action text-right">
                                    <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                  </div><!-- /.action -->

                                </form><!-- /.cnt-form -->
                                @foreach ($courseReview as $review)


                                <div class="product-reviews">
                                  <h5 class="title">{{ $review->user->name }}</h5>

                                  <div class="reviews">
                                    <div class="review">
                                      <div class="review-title">
                                          <span class="summary">
                                        @for ($i =1 ; $i <= 5 ; $i++)
                                         <span style="color: red" class="fa fa-star{{ ($i <= $review->rating) ? '' : '-empty' }}"></span>
                                       @endfor
                                          </span>
                                       <span class="date"><i class="fa fa-calendar"></i><span> {{ $review->created_at->diffForHumans() }}</span></span></div>
                                      <div class="text">"{{ $review->comment }}" </div>
                                    </div>
                                  </div><!-- /.reviews -->
                                </div><!-- /.product-reviews -->
                                @endforeach
                              </div><!-- /.form-container -->
                            </div><!-- /.review-form -->

                          </div><!-- /.product-add-review -->


                        </div>

                      </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!--<script src="https://player.vimeo.com/api/player.js"></script>

    <script>
        var player;
        var youtubeplayer;
        //var a = $(this).attr('data-src');
        var video_ids = <?php echo $vimeo ?>;
        var video_type = <?php echo $type ?>;
        var youtube = <?php echo $youtube ?>;

        if (video_type[0].toLowerCase() === 'youtube'){
            var video = document.getElementsByTagName('iframe')[0];
            video.src = youtube[0].toString()+'?autoplay=1';

            function onYouTubeIframeAPIReady() {
                youtubeplayer = new YT.Player('player', {
                    height: '390',
                    width: '640',
                    videoId: 'M7lc1UVf-VE',
                    playerVars: {
                        'playsinline': 1
                    },
                    events: {
                        'onReady': onPlayerReady,
                        'onStateChange': onPlayerStateChange
                    }
                });
            }

            // 4. The API will call this function when the video player is ready.
            function onPlayerReady(event) {
                event.target.playVideo();
            }

            // 5. The API calls this function when the player's state changes.
            //    The function indicates that when playing a video (state=1),
            //    the player should play for six seconds and then stop.
            var done = false;
            function onPlayerStateChange(event) {
                if (event.data == YT.PlayerState.PLAYING && !done) {
                    setTimeout(stopVideo, 6000);
                    done = true;
                }
            }
            function stopVideo() {
                youtubeplayer.stopVideo();
            }

        }else{
            var iframe = document.querySelector('iframe');
            $('#iframe').attr("src", 'https://player.vimeo.com/video/'+video_ids[0])
            var embedOptions = {
                autoplay: true,
                muted: true
            };
            // iframe.allow = "autoplay";
            // iframe.autoplay = "";
            player = new Vimeo.Player(iframe, embedOptions);
            iframe.style.zIndex = 0;


            //console.log(video_ids[0])
            var index = 0;
            var playNext = function () {
                alert('next video');
                player.pause();
                if (index <= video_ids.length)
                    player.loadVideo(video_ids[index++])
            }
            player.pause();
            player.loadVideo(video_ids[index++]);
            player.on('loaded', function () {
                player.play();
            });

            player.on('ended', playNext);
            video_ids.forEach(function(item) {
                console.log(item, $('#'+item +'span'),'asd');

                player.loadVideo(item).then(() => {
                    player.ready().then(() => {
                        player.getDuration().then(function (data) {

                            var totalSec = data;
                            var hours = parseInt(totalSec / 3600) % 24;
                            var minutes = parseInt(totalSec / 60) % 60;
                            var seconds = totalSec % 60;

                            var result = (hours < 1 ? "" : hours + ":") + (minutes < 1 ? "0" : minutes+' min') + " " + (seconds < 10 ? "0" + seconds : seconds+' seconds')
                            $('#'+item +' span').text(result)
                            console.log(result)
                        });
                    }).catch((err) => console.log(err));
                })

                // do something with `item`
            });
        }



        function play(clip,type) {
            console.log(type.toLowerCase(),clip);
            if (type.toLowerCase() === 'youtube'){
                var video = document.getElementsByTagName('iframe')[0];
                video.src = clip+'?autoplay=1';
                return false;
            }else{
                player.loadVideo(clip)

                player.on('loaded', function () {
                    player.play();
                });

                player.on('ended', playNext);
            }

        }

    </script>-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
        $('#ulActive a').click(function(){
        $('#ulActive a').removeClass("active")
            $(this).toggleClass("active");
        });
    });
    </script>




@endsection
