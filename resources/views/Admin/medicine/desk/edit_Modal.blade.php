<form id="edit_form" enctype="multipart/form-data" method="post">
    <div class="modal-body">
      <div class="form-group">
        <input type="hidden" class="form-control" id="desk_id" name="desk_id" value="{{ $desk->desk_id }}">
      </div>
      <div class="form-group">
        <label>Desk Name</label>
        <input type="text" class="form-control" placeholder="Enter Category Name" id="desk_name" name="desk_name" value="{{ $desk->desk_name }}">
      </div>
      <div class="form-group">
        <label>Desk Code</label>
        <input type="text" class="form-control" placeholder="Enter Desk Code" id="desk_code" name="desk_code" value="{{ $desk->desk_code }}">
      </div>
      <div class="form-group">
        <label>Desk Description</label>
        <input type="text" class="form-control" placeholder="Enter Desk Description" id="desk_description" name="desk_description" value="{{ $desk->desk_description }}">
      </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
