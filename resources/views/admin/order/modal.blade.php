<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Order Status</h4>
        </div>
        <div class="modal-body">
          <form action="{{route('updateStatus')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="order_id" id="title" value=""/>
            <div class="form-group">
              <label>Change Your Order Status</label>
              <select name="status" id="" class="form-control">
                    <option value="">--Select order status--</option>
                    <option value="new">New</option>
                    <option value="verified">Verified</option>
                    <option value="cancel">cancel</option>
                    <option value="process">process</option>
                    <option value="delivered">delivered</option>
                </select>
            </div>
            

            <div class="form-group">
              <input type="submit" name="submit" value="submit" class="btn btn-success mt-3">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>