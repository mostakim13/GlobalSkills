<div class="sticky-header navbar-expand-lg">
        <div class="menu-bar clearfix">
            <div class="container clearfix">
      <!-- Header Logo ==== -->
      <div class="menu-logo">
        <a href="{{route('home')}}"><img src="{{ asset('images/logo.gif')}}" alt=""></a>
      </div>
      <!-- Mobile Nav Button ==== -->

      <!-- Author Nav ==== -->
                <div class="secondary-menu">
                    <div class="secondary-inner">
                        <ul>
                          <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                  <span></span>
                </button>

            <li><a href="https://www.facebook.com/globalskillsbd" class="btn-link"><i class="fab fa-facebook"></i></a></li>
            <li><a href="https://twitter.com/gsdabd?lang=en" class="btn-link"><i class="fab fa-twitter"></i></a></li>
            <li><a href="https://www.linkedin.com/company/globalskillsbd" class="btn-link"><i class="fab fa-linkedin"></i></a></li>
            <!-- Search Button ==== -->
            <li class="search-btn"><button id="quik-search-btn" type="button" class="btn-link"><i class="fa fa-search"></i></button></li>
            <li><a href="{{route('carts')}}" class="btn-link"><i class="fa fa-cart-plus fa-2x"></i>
              <span class="badge badge-danger">{{App\Models\Cart::totalItems()}}</span>

            </a></li>

          </ul>
        </div>
      </div>
      <!-- Search Box ==== -->
                <div class="nav-search-bar">
                  <form class="cours-search" action="/search" method="GET">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="What do you want to learn today?	" name="query">
                  <div class="input-group-append">
                    <button class="btn" type="submit">Search</button>
                  </div>
                </div>
              </form>
        <span id="search-remove"><i class="ti-close"></i></span>
                </div>
      <!-- Navigation Menu ==== -->
                <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
        <div class="menu-logo">
          <a href="index.html"><img src="assets/images/logo.png" alt=""></a>
        </div>
                    <ul class="nav navbar-nav">
          <li class="active"><a href="{{route('home')}}">Home</a>

          </li>
          <li><a href="javascript:;">Pages <i class="fa fa-chevron-down"></i></a>
            <ul class="sub-menu">
              <li><a href="{{route('about')}}">About</a>

              </li>
            <!--  <li><a href="javascript:;">Event<i class="fa fa-angle-right"></i></a>
                <ul class="sub-menu">
                  <li><a href="{{route('event')}}">Event</a></li>
                  <li><a href="#">Events Details</a></li>
                </ul>
              </li>-->
              <li><a href="{{route('faq')}}">FAQ's</a>

              </li>
              <li><a href="{{route('contact')}}">Contact Us</a>

              </li>


            </ul>
          </li>
         <li class="add-mega-menu"><a href="{{route('courses')}}">E-learning Courses</a>

          </li>
          <li class="add-mega-menu"><a href="{{route('classroom-courses')}}">Classroom Courses</a>

          </li>
          <li class="add-mega-menu"><a href="{{route('all-blogs')}}">Blogs</a>

          </li>

          <li class="add-mega-menu"><a href="{{route('online-quiz')}}">Online Quiz</a>

          </li>


        </ul>
        <div class="nav-social-link">
          <a href="javascript:;"><i class="fa fa-facebook"></i></a>
          <a href="javascript:;"><i class="fa fa-google-plus"></i></a>
          <a href="javascript:;"><i class="fa fa-linkedin"></i></a>
        </div>
                </div>
                <div class="col-md-6 offset-md-2" style="padding: 5px" >
                 <form id="sform" action="/search" >
                   <div class="input-group">
                     <input autocomplete="off" onfocus="showSearchResult()" onblur="hideSearchResult()" type="text" name="query" id="search" class="form-control typeahead" placeholder="What do you want to learn today?	">
                     <div class="input-group-append">
                       <button class="btn" type="submit">Search</button>
                     </div>
                   </div>
                 </form>
                 <div id="suggestProduct"></div>
               </div>
      <!-- Navigation Menu END ==== -->
            </div>
        </div>
    </div>
    <style>
      .search-area{
          position: relative;
      }
      #suggestProduct {
          position: absolute;
          top: 100%;
          left: 0;
          width: 100%;
          background:#654C9B;
          z-index: 999;
          border-radius: 4px;
          margin-top: 2px;
      }
      </style>
    @push('scripts')
<script>
  $("body").on("keyup","#search",function(){
    let searchData = $("#search").val();
    if(searchData.length>0){
      $.ajax({
        type:'POST',
        url:"{{ url('/find-products') }}",
        data:{search:searchData},
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success:function(result){
            $('#suggestProduct').html(result)
        }
      });
    }
    if(searchData.length<1) $('#suggestProduct').html("")
  })
</script>


@endpush
@push('scripts')
<script>
  function showSearchResult(){
      $('#suggestProduct').slideDown();
  }
  function hideSearchResult(){
      $('#suggestProduct').slideUp();
  }
</script>
@endpush
