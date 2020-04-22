    @csrf
    <div class="modal-body">
      <div class="form-group">
        <label>Company Name</label>
        <input type="text" class="form-control" placeholder="Enter Category Name" id="company_name" name="company_name">
      </div>
      <div class="form-group">
        <label>Phone Number</label>
        <input type="text" class="form-control" placeholder="Enter Phone Number" id="company_phone" name="company_phone">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" placeholder="Enter Email" id="company_email" name="company_email">
      </div>
      <div class="form-group">
        <label>Address</label>
        <input type="text" class="form-control" placeholder="Enter Address" id="company_address" name="company_address">
      </div>
      <div class="form-group">
        <label>Company Status</label>
        <select class="form-control" name="company_status" id="company_status">
          <option value="Active">Active</option>
          <option value="Inactive">Inactive</option>
        </select>
      </div>
    </div>
