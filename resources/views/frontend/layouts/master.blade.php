<!DOCTYPE html>
<html lang="en">
@include('frontend.partials.header')


<body id="bg">
<div class="page-wraper">
<div id="loading-icon-bx"></div>
	<!-- Header Top ==== -->
    <header class="header rs-nav header-transparent">

		@include('frontend.partials.topbar')

		@include('frontend.partials.navbar')
    <!-- Header Top END ==== -->
		</header>
    <!-- Content -->

		@yield('content')
    <!-- Content END-->
	<!-- Footer ==== -->

		@include('frontend.partials.footer')
    <!-- Footer END ==== -->
    <button class="back-to-top fa fa-chevron-up" ></button>
</div>

@include('frontend.partials.scripts')
</body>

</html>
