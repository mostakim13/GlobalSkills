<div class="modal fade" id="SystemAddModal" tabindex="-1" role="dialog" aria-labelledby="SystemAddModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="SystemAddModal">Manage System</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('store-system-settings')}}" method="POST" enctype="multipart/form-data">
                    @csrf





                    <div class="form-group">
                        <label for="vat">Vat</label>
                        <input type="number" class="form-control" name="vat" aria-describedby="vat"
                               placeholder="Vat">

                    </div>
                    <div class="form-group">
                        <label for="tax">Tax</label>
                        <input type="number" class="form-control" name="tax" aria-describedby="tax"
                               placeholder="tax">

                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
