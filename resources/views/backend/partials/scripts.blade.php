<script src="{{ asset('admin/js/jquery.min.js')}}"></script>
<script src="{{ asset('admin/vendors/bootstrap/js/popper.min.js')}}"></script>
<script src="{{ asset('admin/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('admin/vendors/bootstrap-select/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('admin/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>
<script src="{{ asset('admin/vendors/magnific-popup/magnific-popup.js')}}"></script>
<script src="{{ asset('admin/vendors/counter/waypoints-min.js')}}"></script>
<script src="{{ asset('admin/vendors/counter/counterup.min.js')}}"></script>
<script src="{{ asset('admin/vendors/imagesloaded/imagesloaded.js')}}"></script>
<script src="{{ asset('admin/vendors/masonry/masonry.js')}}"></script>
<script src="{{ asset('admin/vendors/masonry/filter.js')}}"></script>
<script src="{{ asset('admin/vendors/owl-carousel/owl.carousel.js')}}"></script>
<script src="{{ asset('admin/vendors/scroll/scrollbar.min.js')}}"></script>

<script src="{{asset('backend')}}/lib/datatables/jquery.dataTables.js"></script>
<script src="{{asset('backend')}}/lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="{{asset('backend')}}/lib/select2/js/select2.min.js"></script>

<script src="{{ asset('admin/js/functions.js')}}"></script>
<script src="{{ asset('admin/vendors/chart/chart.min.js')}}"></script>
<script src="{{ asset('admin/js/admin.js')}}"></script>
<script src="{{ asset('admin/vendors/calendar/moment.min.js')}}"></script>
<script src="{{ asset('admin/vendors/calendar/fullcalendar.js')}}"></script>

<script src="{{ asset('admin/js/fontawesome.js')}}"></script>
{{--<script src="{{asset('admin/summernote/bootstrap.min.css')}}"></script>--}}
<script src="{{asset('admin/summernote/js/popper.min.js')}}" ></script>
<script src="{{asset('admin/summernote/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/summernote/js/summernote.min.js')}}"></script>
<script src="{{ asset('backend') }}/lib/sweetalert/sweetalert.min.js"></script>


<script src="{{ asset('backend') }}/lib/sweetalert/code.js"></script>
<script type="text/javascript" src="{{ asset('common' )}}/jquery.form-validaton-min.js"></script>
<script>
    $.validate({
        lang:'en'
    });
</script>


<script type="text/javascript" src="{{ asset('backend') }}/lib/toastr/toastr.min.js"></script>

<script>
  @if(Session::has('message'))
	var type ="{{Session::get('alert-type','info')}}"
	switch(type){
		case 'info':
			toastr.info(" {{Session::get('message')}} ");
			break;
		case 'success':
			toastr.success(" {{Session::get('message')}} ");
			break;
		case 'warning':
			toastr.warning(" {{Session::get('message')}} ");
			break;
		case 'error':
			toastr.error(" {{Session::get('message')}} ");
			break;
	}
@endif
</script>

<script>
  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      defaultDate: '2019-03-12',
      navLinks: true, // can click day/week names to navigate views

      weekNumbers: true,
      weekNumbersWithinDays: true,
      weekNumberCalculation: 'ISO',

      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        {
          title: 'All Day Event',
          start: '2019-03-01'
        },
        {
          title: 'Long Event',
          start: '2019-03-07',
          end: '2019-03-10'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2019-03-09T16:00:00'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2019-03-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2019-03-11',
          end: '2019-03-13'
        },
        {
          title: 'Meeting',
          start: '2019-03-12T10:30:00',
          end: '2019-03-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2019-03-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2019-03-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2019-03-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2019-03-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2019-03-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2019-03-28'
        }
      ]
    });

  });

</script>


@stack('scripts')
