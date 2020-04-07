<form id="modal_form" method="post">
    <div class="modal-body">
      <div class="form-group">
        <label>Customer Name</label>
        <input type="text" class="form-control" placeholder="Enter Customer Name" id="customer_name" name="customer_name">
      </div>
      <div class="form-group">
        <label>Customer Phone</label>
        <input type="text" class="form-control" placeholder="Enter Phone Number" id="customer_phone" name="customer_phone">
      </div>
      <div class="form-group">
        <label>Customer Address</label>
        <textarea id="customer_address" name="customer_address" class="form-control" placeholder="Customer Address"></textarea>
      </div>
      <div class="form-group">
        <label>Company Status</label>
        <select class="form-control" name="customer_status" id="customer_status">
          <option value="Active">Active</option>
          <option value="Inactive">Inactive</option>
        </select>
      </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
