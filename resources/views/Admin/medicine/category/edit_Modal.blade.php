<form id="edit_form" enctype="multipart/form-data" method="post">
    <div class="modal-body">
      <div class="form-group">
        <input type="hidden" class="form-control" id="catagory_id" name="catagory_id" value="{{ $catagory->catagory_id }}">
      </div>
      <div class="form-group">
        <label>Category Name</label>
        <input type="text" class="form-control" placeholder="Enter Category Name" id="catagory_name" name="catagory_name" value="{{ $catagory->catagory_name }}">
      </div>
      <div class="form-group">
        <label>Category Description</label>
        <input type="text" class="form-control" placeholder="Enter Category Description" id="catagory_description" name="catagory_description" value="{{ $catagory->catagory_description }}">
      </div>
      <div class="form-group">
        <label>Category Status</label>
        <select class="form-control" name="catagory_status" id="catagory_status">
          <option value="Active" {{$catagory->catagory_status=='Active' ? 'selected' : ''}}>Active</option>
          <option value="Inactive" {{$catagory->catagory_status=='Inactive' ? 'selected' : ''}}>Inactive</option>
        </select>
      </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
