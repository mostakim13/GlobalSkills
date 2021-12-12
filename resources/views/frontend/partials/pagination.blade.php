@if($paginator->hasPages())
<div class="pagination-bx rounded-sm gray clearfix">
  <ul class="pagination">

    @if($paginator->onFirstPage())
    <li class="previous"><a><i class="ti-arrow-left"></i> Prev</a></li>



    @else
    <li class="previous"><a href="{{$paginator->previousPageUrl()}}"><i class="ti-arrow-left"></i> Prev</a></li>

    @endif

    @if(is_array($elements[0]))
    @foreach($elements[0] as $page => $url)
          <li class="active"><a href="{{$url}}">{{$page}}</a></li>
    @endforeach
    @endif

    @if($paginator->hasMorePages())
    <li class="next"><a href="{{$paginator->nextPageUrl()}}">Next <i class="ti-arrow-right"></i></a></li>

    @endif



  </ul>
</div>


@endif
