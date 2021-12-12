<div class="modal fade" id="CurrencyEditModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="CurrencyEditModal{{$row->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CurrencyEditModal{{$row->id}}">Edit Currency</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.currency.update')}}" method="POST" enctype="multipart/form-data">
          @csrf
            <input type="hidden" name="id" value="{{$row->id}}">
            <div class="form-group">
              <label for="classroom_course_title">Currency Code</label>
              <input type="text" class="form-control" value="{{$row->currency_code}}" name="currency_code" aria-describedby="currency_code" placeholder="Enter Currency Code">

            </div>
            <div class="form-group">
              <label class="col-form-label">Exchange Rate</label>
              <div>
              <input type="number" class="form-control" value="{{$row->exchange_rate}}" name="exchange_rate" aria-describedby="exchange_rate" placeholder="Enter Exchange Rate">
              </div>
            </div>
            <div class="form-group">
              <label for="custom select">Status</label>
              <select class="form-control" name="status">


                <option value="0">Inactive</option>
                <option value="1">Active</option>

              </select>
            </div>


                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>
