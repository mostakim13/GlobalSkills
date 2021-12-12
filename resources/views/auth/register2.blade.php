<!DOCTYPE html>
<html lang="en">


<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />

	<!-- DESCRIPTION -->
	<meta name="description" content="EduChamp : Education HTML Template" />

	<!-- OG -->
	<meta property="og:title" content="EduChamp : Education HTML Template" />
	<meta property="og:description" content="EduChamp : Education HTML Template" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">

	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="{{ asset('images/favicon.ico')}}" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png')}}" />

	<!-- PAGE TITLE HERE ============================================= -->
	<title>Global Skills Development Agency</title>

	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--[if lt IE 9]>
	<script src="{{ asset('js/html5shiv.min.js')}}"></script>
	<script src="{{ asset('js/respond.min.js')}}"></script>
	<![endif]-->

	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/assets.css')}}">

	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/typography.css')}}">

	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/shortcodes/shortcodes.css')}}">

	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
	<link class="skin" rel="stylesheet" type="text/css" href="{{ asset('css/color/color-1.css')}}">

</head>



<!-- Content -->
<div class="page-wraper">
	<div id="loading-icon-bx"></div>
	<div class="account-form">
		<div class="account-head" style="background-image:url({{ asset('images/background/bg2.jpg')}});">
			<a href="index.html"><img src="{{ asset('images/gsda logo.png')}}" alt=""></a>
		</div>
    <div class="account-form-inner">
      <div class="account-container">
        <div class="heading-bx left">
          <h2 class="title-head">Sign Up <span>Now</span></h2>
          <p>Login Your Account <a href="{{route('login')}}">Click here</a></p>
        </div>
        <form class="contact-bx" method="POST" action="{{ route('register') }}">

              @csrf
          <div class="row placeani">
            <div class="col-lg-12">
              <div class="form-group">
                <div class="input-group">
                  <label for="name">Your Name</label>

                  <input  id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <div class="input-group">
                  <label for="email">Your Email Address</label>
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <div class="input-group">
                  <label for="phone">Your Mobile Number</label>
                  <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                  @error('phone')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <div class="input-group">
                  <label for="password">Your Password</label>
                  <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <div class="input-group">
                  <label for="password">Confirm Password</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="col-lg-12 m-b30">
              <button name="submit" type="submit" value="Submit" class="btn button-md">Sign Up</button>
            </div>
            <div class="col-lg-12">
              <h6>Sign Up with Social media</h6>
              <div class="d-flex">
                <a class="btn flex-fill m-r5 facebook" href="#"><i class="fa fa-facebook"></i>Facebook</a>
                <a class="btn flex-fill m-l5 google-plus" href="#"><i class="fa fa-google-plus"></i>Google Plus</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
	</div>
</div>






<script src="{{ asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('vendors/bootstrap/js/popper.min.js')}}"></script>
<script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('vendors/bootstrap-select/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>
<script src="{{ asset('vendors/magnific-popup/magnific-popup.js')}}"></script>
<script src="{{ asset('vendors/counter/waypoints-min.js')}}"></script>
<script src="{{ asset('vendors/counter/counterup.min.js')}}"></script>
<script src="{{ asset('vendors/imagesloaded/imagesloaded.js')}}"></script>
<script src="{{ asset('vendors/masonry/masonry.js')}}"></script>
<script src="{{ asset('vendors/masonry/filter.js')}}"></script>
<script src="{{ asset('vendors/owl-carousel/owl.carousel.js')}}"></script>
<script src="{{ asset('js/functions.js')}}"></script>
<script src="{{ asset('js/contact.js')}}"></script>
<script src="{{ asset('vendors/switcher/switcher.js')}}"></script>
</body>

</html>
