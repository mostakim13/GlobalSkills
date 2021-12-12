@extends('frontend.layouts.master')


@section('content')



<!-- Content -->

<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url({{asset('images/banner/banner3.jpg')}});">
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
      <li>Contact Us</li>
    </ul>
  </div>
</div>
<!-- Breadcrumb row END -->

    <!-- inner page banner -->
    <div class="page-banner contact-page section-sp2">
        <div class="container">
            <div class="row">
      <div class="col-lg-5 col-md-5 m-b30">
        <div class="bg-primary text-white contact-info-bx">
          <h2 class="m-b10 title-head">Contact <span>Information</span></h2>

          <div class="widget widget_getintuch">
            <ul>
              <li><i class="ti-location-pin"></i>Hayat Rose Park
                  Level 5, House No 16
                  Main Road, Bashundhara Residential Area
                  Dhaka 1229
                  Bangladesh</li>
              <li><i class="ti-mobile"></i>+88 01766 343 434</li>
              <li><i class="ti-email"></i>info@globalskills.com.bd</li>
            </ul>
          </div>
          <h5 class="m-t0 m-b20">Follow Us</h5>
          <ul class="list-inline contact-social-bx">
            <li><a href="#" class="btn outline radius-xl"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#" class="btn outline radius-xl"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#" class="btn outline radius-xl"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="#" class="btn outline radius-xl"><i class="fab fa-google-plus"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-7 col-md-7">
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
    <!-- inner page banner END -->
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
  //add to cart

</script>


@endpush



@endsection
