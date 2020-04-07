<form id="edit_form" method="post">
    <div class="modal-body">
      <div class="form-group">
        <label>Customer Name</label>
        <input type="text" class="form-control" placeholder="Enter Customer Name" id="customer_name" name="customer_name" value="{{$customer->customer_name}}" >
      </div>
        <input type="hidden" class="form-control" id="customer_id" name="customer_id" value="{{ $customer->customer_id }}">
      <div class="form-group">
        <label>Customer Phone</label>
        <input type="text" class="form-control" placeholder="Enter Phone Number" id="customer_phone" name="customer_phone" value="{{$customer->customer_phone}}">
      </div>
      <div class="form-group">
        <label>Customer Address</label>
        <textarea id="customer_address" name="customer_address" class="form-control" placeholder="Customer Address">{{$customer->customer_address}}</textarea>
      </div>
      <div class="form-group">
        <label>Company Status</label>
        <select class="form-control" name="customer_status" id="customer_status">
          <option value="Active" {{$customer->customer_status=='Active' ? 'selected' : '' }}>Active</option>
          <option value="Inactive" {{$customer->customer_status=='Inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
      </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
