<div class="modal fade" id="UserProfileAddModal" tabindex="-1" role="dialog" aria-labelledby="UserProfileAddModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UserProfileAddModal">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="">
            <div class="form-group row">
              <div class="col-12 col-sm-9 col-md-9 col-lg-10 ml-auto">
                <h3>1. Personal Details</h3>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Full Name</label>
              <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                <input class="form-control" type="text" value="Mark Andre">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Occupation</label>
              <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                <input class="form-control" type="text" value="CTO">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Company Name</label>
              <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                <input class="form-control" type="text" value="EduChamp">
                <span class="help">If you want your invoices addressed to a company. Leave blank to use your full name.</span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Phone No.</label>
              <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                <input class="form-control" type="text" value="+120 012345 6789">
              </div>
            </div>

            <div class="seperator"></div>

            <div class="form-group row">
              <div class="col-12 col-sm-9 col-md-9 col-lg-10 ml-auto">
                <h3>2. Address</h3>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Address</label>
              <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                <input class="form-control" type="text" value="5-S2-20 Dummy City, UK">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">City</label>
              <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                <input class="form-control" type="text" value="US">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">State</label>
              <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                <input class="form-control" type="text" value="California">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Postcode</label>
              <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                <input class="form-control" type="text" value="000702">
              </div>
            </div>

            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

            <div class="form-group row">
              <div class="col-12 col-sm-9 col-md-9 col-lg-10 ml-auto">
                <h3 class="m-form__section">3. Social Links</h3>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Linkedin</label>
              <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                <input class="form-control" type="text" value="www.linkedin.com">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Facebook</label>
              <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                <input class="form-control" type="text" value="www.facebook.com">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Twitter</label>
              <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                <input class="form-control" type="text" value="www.twitter.com">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Instagram</label>
              <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                <input class="form-control" type="text" value="www.instagram.com">
              </div>
            </div>
          </div>
          <div class="">
            <div class="">
              <div class="row">
                <div class="col-12 col-sm-3 col-md-3 col-lg-2">
                </div>
                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                  <button type="reset" class="btn">Save changes</button>
                  <button type="reset" class="btn-secondry">Cancel</button>
                </div>
              </div>
            </div>
          </div>
      </div>
        </form>
    </div>
  </div>
</div>
