<div class="tab-pane" id="change-password">
    <div class="profile-head">
      <h3>Change Password</h3>
    </div>
    <form class="edit-profile" form action="{{ route('change-password-store') }}" method="POST">
        @csrf
      <div class="">
        <div class="form-group row">
          <div class="col-12 col-sm-8 col-md-8 col-lg-9 ml-auto">
            <h3>Password</h3>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-sm-4 col-md-4 col-lg-3 col-form-label">Current Password</label>
          <div class="col-12 col-sm-8 col-md-8 col-lg-7">
            <input name="old_password" class="form-control" type="password" value="">
            @error('old_password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-sm-4 col-md-4 col-lg-3 col-form-label">New Password</label>
          <div class="col-12 col-sm-8 col-md-8 col-lg-7">
            <input name="new_password" class="form-control" type="password" value="">
            @error('new_password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-sm-4 col-md-4 col-lg-3 col-form-label">Re-Type New Password</label>
          <div class="col-12 col-sm-8 col-md-8 col-lg-7">
            <input name="password_confirmation" class="form-control" type="password" value="">
            @error('password_confirmation')
            <span class="text-danger">{{ $message }}</span>
        @enderror
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-sm-4 col-md-4 col-lg-3">
        </div>
        <div class="col-12 col-sm-8 col-md-8 col-lg-7">
          <button type="submit" class="btn">Save changes</button>
          <button type="reset" class="btn-secondry">Cancel</button>
        </div>
      </div>

    </form>
  </div>
