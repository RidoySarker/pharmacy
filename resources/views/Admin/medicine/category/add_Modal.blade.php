<form id="modal_form" enctype="multipart/form-data" method="post">
    <div class="modal-body">
      <div class="form-group">
        <label>Category Name</label>
        <input type="text" class="form-control" placeholder="Enter Category Name" id="catagory_name" name="catagory_name">
        <span id="catagory_name_error"></span>
      </div>
      <div class="form-group">
        <label>Category Description</label>
        <input type="text" class="form-control" placeholder="Enter Category Description" id="catagory_description" name="catagory_description">
        <span id="catagory_description_error"></span>
      </div>
      <div class="form-group">
        <label>Category Status</label>
        <select class="form-control" name="catagory_status" id="catagory_status">
          <option value="Active">Active</option>
          <option value="Inactive">Inactive</option>
        </select>
      </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
