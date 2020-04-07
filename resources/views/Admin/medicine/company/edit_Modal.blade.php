<form id="edit_form" enctype="multipart/form-data" method="post">
    <div class="modal-body">
      <div class="form-group">
        <input type="hidden" class="form-control" id="company_id" name="company_id" value="{{ $company->company_id }}">
      </div>
      <div class="form-group">
        <label>Company Name</label>
        <input type="text" class="form-control" placeholder="Enter Category Name" id="company_name" name="company_name" value="{{ $company->company_name }}">
      </div>
      <div class="form-group">
        <label>Phone Number</label>
        <input type="text" class="form-control" placeholder="Enter Phone Number" id="company_phone" name="company_phone" value="{{ $company->company_phone }}">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" placeholder="Enter Email" id="company_email" name="company_email" value="{{ $company->company_email }}">
      </div>
      <div class="form-group">
        <label>Address</label>
        <input type="text" class="form-control" placeholder="Enter Address" id="company_address" name="company_address" value="{{ $company->company_address }}">
      </div>
      <div class="form-group">
        <label>Company Status</label>
        <select class="form-control" name="company_status" id="company_status">
          <option value="Active" {{$company->company_status=='Active' ? 'selected' : ''}}>Active</option>
          <option value="Inactive" {{$company->company_status=='Inactive' ? 'selected' : ''}}>Inactive</option>
        </select>
      </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
