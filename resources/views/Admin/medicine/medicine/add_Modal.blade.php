   @csrf
   
      <div class="container-fluid">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
      <div class="form-group">
        <label>Medicine Code</label>
        <input type="number" class="form-control" placeholder="Enter Medicine Code" id="medicine_code" min="0" name="medicine_code">
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
        <label>Purcase Price</label>
        <input type="number" class="form-control" placeholder="Purcase Price" id="purcase_price" name="purcase_price">
      </div>
      <div class="form-group">
        <label>Whole Sale Price</label>
        <input type="number" class="form-control" placeholder="Whole Sale Price" id="whole_sell_price" name="whole_sell_price">
      </div>
      <div class="form-group">
        <label>Retail Price</label>
        <input type="number" class="form-control" placeholder="Retail Price" id="retail_price" name="retail_price">
      </div>
              </div>
              <div class="col-md-6">
      <div class="form-group">
        <label>Medicine Name</label>
        <input type="text" class="form-control" placeholder="Medicine Name" id="medicine_name" name="medicine_name">
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
        <label>Medicine Description</label>
        <input type="text" class="form-control" placeholder="Medicine Description" id="medicine_description" name="medicine_description">
      </div>
      <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="medicine_status" id="medicine_status">
          <option value="Active">Active</option>
          <option value="Inactive">Inactive</option>
        </select>
      </div>
      </div>
    </div>
</div>
     