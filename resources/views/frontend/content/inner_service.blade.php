<div class="section-area content-inner service-info-bx">
          <div class="container">
    <div class="row">
      <?php
      $categories = App\Models\MainCategory::all();

       ?>
      @foreach ($categories as $row)


      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="service-bx">
          <div class="action-box">
            <img src="{{asset("storage/category/$row->image")}}" alt="">
          </div>
          <div class="info-bx text-center">
            <div class="feature-box-sm radius bg-white">
              <i class="fa fa-bank text-primary"></i>
            </div>
            <h4 style="color:#ca2128; text-transform:uppercase;">{{$row->mcategory_title}}</h4>

          </div>
        </div>
      </div>



      @endforeach

    </div>
  </div>
      </div>
      <!-- Our Services END -->
