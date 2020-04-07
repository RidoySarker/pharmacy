<form id="modal_form" enctype="multipart/form-data" method="post">
    <div class="modal-body">
      <div class="form-group">
        <label>Medicine Code</label>
        <input type="text" class="form-control" placeholder="Enter Medicine Code" id="medicine_code" name="medicine_code">
      </div>
      <div class="form-group">
        <label>Medicine Name</label>
        <input type="text" class="form-control" placeholder="Enter Medicine Name" id="medicine_name" name="medicine_name">
      </div>
      <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="catagory" id="catagory">
          <option hidden>Select Option</option>
          @foreach($catagory as $value)
          <option value="{{ $value->catagory_name }}">{{ $value->catagory_name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Company Name</label>
        <select class="form-control" name="company_name" id="company_name">
          <option hidden>Select Option</option>
          @foreach($company as $value)
          <option value="{{ $value->company_name }}">{{ $value->company_name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Desk Name</label>
        <select class="form-control" name="desk_name" id="desk_name">
          <option hidden>Select Option</option>
          @foreach($desk as $value)
          <option value="{{ $value->desk_name }}">{{ $value->desk_name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Purcase Price</label>
        <input type="number" class="form-control" placeholder="Enter Purcase Price" id="purcase_price" name="purcase_price">
      </div>
      <div class="form-group">
        <label>Retail Price</label>
        <input type="number" class="form-control" placeholder="Enter Retail Price" id="retail_price" name="retail_price">
      </div>
      <div class="form-group">
        <label>Whole Sale Price</label>
        <input type="number" class="form-control" placeholder="Enter Whole Sale Price" id="whole_sell_price" name="whole_sell_price">
      </div>
      <div class="form-group">
        <label>Medicine Description</label>
        <input type="text" class="form-control" placeholder="Enter Medicine Description" id="medicine_description" name="medicine_description">
      </div>
      <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="medicine_status" id="medicine_status">
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