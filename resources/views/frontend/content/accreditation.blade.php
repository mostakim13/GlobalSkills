<div class="section-area section-sp2 popular-courses-bx">
          <div class="container">
    <div class="row">
      <div class="col-md-12 heading-bx left">



        <h2 class="title-head">Accreditation <span>Authority</span></h2>


      </div>
    </div>
    <div class="row">

    <div class="courses-carousel owl-carousel owl-btn-1 col-12 p-lr0">
      <?php
      $accreditations = App\Models\Accreditation::all();

       ?>
      @foreach ($accreditations as $row)


      <div class="item">
        <div class="cours-bx">
          <div class="action-box">
            <img src="{{asset("storage/Accreditation/$row->accreditation_image")}}" alt="" height="420"
            width="700">

          </div>


        </div>
      </div>
      @endforeach

    </div>

    </div>

  </div>
</div>
