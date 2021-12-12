@extends('frontend.layouts.master')


@section('content')



<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url({{ asset('images/banner/banner1.jpg')}});">
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
      <li>Faqs</li>
    </ul>
  </div>
</div>
<!-- Breadcrumb row END -->
    <!-- contact area -->
    <div class="content-block">
        <!-- Your Faq -->
        <div class="section-area section-sp1">
            <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-12">
          <div class="heading-bx left">
            <h2 class="m-b10 title-head">Asked <span> Questions</span></h2>
          </div>
          <div class="ttr-accordion m-b30 faq-bx" id="accordion1">
            @foreach ($faqs as $item)

            <div class="panel">
              <div class="acod-head">
                <h6 class="acod-title">
                  <a data-toggle="collapse" href="#faq1{{ $item->id }}" class="collapsed" data-parent="#faq1">
                    {{ $item->subject }} </a> </h6>
              </div>

              <div id="faq1{{ $item->id }}" class="acod-body collapse">
                <br>
                <div class="acod-content">{!! $item->description !!}</div>
                <div class="col-lg-7 col-md-12 heading-bx p-lr">
                  <br>
                  @if($item->video_url)
                  <div class="video-bx">
                    <img src={{ asset($item->image) }} alt=""/>
                    <a  class="venobox popup-youtube video" data-autoplay="true" data-vbtype="video" href="{{ $item->video_url }}" data-gall="faqGallery"><i class="fa fa-play"></i></a>
                  </div>
                  @else
                  <img src={{ asset($item->image) }} alt=""/>
                  @endif
                </div>
                  </div>
            </div>

            @endforeach
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 m-b30">
              <div class="feature-container">
                <div class="feature-md text-white m-b20">
                  <a href="#" class="icon-cell"><img src="{{ asset('images/icon/icon1.png')}}" alt=""></a>
                </div>
                <div class="icon-content">
                  <h5 class="ttr-tilte">Our Philosophy</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 m-b30">
              <div class="feature-container">
                <div class="feature-md text-white m-b20">
                  <a href="#" class="icon-cell"><img src="{{ asset('images/icon/icon2.png')}}" alt=""></a>
                </div>
                <div class="icon-content">
                  <h5 class="ttr-tilte">Kingster's Principle</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 m-b30">
              <div class="feature-container">
                <div class="feature-md text-white m-b20">
                  <a href="#" class="icon-cell"><img src="{{ asset('images/icon/icon3.png')}}" alt=""></a>
                </div>
                <div class="icon-content">
                  <h5 class="ttr-tilte">Key Of Success</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 m-b30">
              <div class="feature-container">
                <div class="feature-md text-white m-b20">
                  <a href="#" class="icon-cell"><img src="{{ asset('images/icon/icon4.png')}}" alt=""></a>
                </div>
                <div class="icon-content">
                  <h5 class="ttr-tilte">Our Philosophy</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12">
          <div  class="contact-bx ajax-form"  >
            <input type="hidden" id="token" value="{{ @csrf_token() }}">

            <div id="res" ></div>
          <div class="ajax-message"></div>
            <div class="heading-bx left">
              <h2 class="title-head">Get In <span>Touch</span></h2>

            </div>
            <div class="row placeani">
              <div class="col-lg-6">
                <div class="form-group">
                  <div class="input-group">
                    <label>Your Name</label>
                    <input name="name" id="name" type="text" class="form-control valid-character">
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <div class="input-group">
                    <label>Your Email Address</label>
                    <input name="email" id="email" type="email" class="form-control" data-validation="required">
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <div class="input-group">
                    <label>Your Phone</label>
                    <input name="phone" id="phone" type="text"  class="form-control int-value" data-validation="required">
                  </div>
                </div>
              </div>

              <div class="col-lg-12">
                <div class="form-group">
                  <div class="input-group">
                    <label>Type Message</label>
                    <textarea name="message" id="message" rows="4" class="form-control" ></textarea>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <button name="submit" type="submit" value="Submit" class="btn button-md" onclick="addData()"> Send Message</button>
              </div>
            </div>
          </div>
        </div>
      </div>

            </div>
        </div>
        <!-- Your Faq End -->
    </div>
<!-- contact area END -->
</div>

<!-- Content END-->

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
  $.ajaxSetup({
      'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
  })
  //product view modal
  function clearData()
  {
    var name=$('#name').val('');
    var email=$('#email').val('');
    var phone=$('#phone').val('');
    var message=$('#message').val('');
  }
  function addData()
  {
    var name=$('#name').val();
    var email=$('#email').val();
    var phone=$('#phone').val();
    var message=$('#message').val();

    $.ajax({
      type:"POST",
      dataType:"json",
      data:{name:name,email:email,phone:phone,message:message},
      url:"/contact/store",
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      success:function(data)
      {
        clearData();
        let timerInterval
            Swal.fire({
              title: 'Message Sent!',
              html: 'I will close in <b></b> milliseconds.',
              timer: 2000,
              timerProgressBar: true,
              didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                  b.textContent = Swal.getTimerLeft()
                }, 100)
              },
              willClose: () => {
                clearInterval(timerInterval)
              }
            }).then((result) => {
              / Read more about handling dismissals below /
              if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
              }
            })
             console.log('successfully data added');
      }
    })
  }


</script>


@endpush


@endsection
