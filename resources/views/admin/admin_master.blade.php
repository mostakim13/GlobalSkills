<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from educhamp.themetrades.com/demo/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:08:15 GMT -->
@include('backend.partials.header')
<body class="ttr-opened-sidebar ttr-pinned-sidebar">

	<!-- header start -->
	@include('backend.partials.navbar')
	<!-- header end -->
	<!-- Left sidebar menu start -->
@include('backend.partials.left_sidebar')
	<!-- Left sidebar menu end -->

	<!--Main container start -->
	<main class="ttr-wrapper">
	@yield('admin_dashboard_content')
	</main>
	<div class="ttr-overlay"></div>

<!-- External JavaScripts -->
@include('backend.partials.scripts')
</body>

<!-- Mirrored from educhamp.themetrades.com/demo/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:09:05 GMT -->
</html>
