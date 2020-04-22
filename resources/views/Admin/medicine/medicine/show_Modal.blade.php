
      <div class="container-fluid">
          <div class="card-body">
            <div class="row">
          <div class="form-group">
        <input type="hidden" class="form-control" id="medicine_id" name="medicine_id" value="{{ $medicine->medicine_id }}">
      </div>
      <div class="col-md-6">
      <div class="form-group">
        <label>Medicine Code</label>
        <input class="form-control" placeholder="Enter Medicine Code" id="medicine_code" name="medicine_code" value="{{ $medicine->medicine_code }}" readonly="">
      </div>
      <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="catagory" id="catagory" disabled="">
          <option hidden>Select Option</option>
          @foreach($catagory as $value)
          <option value="{{ $value->catagory_name }}" {{$value->catagory_name==$medicine->catagory ? 'selected' : ''}}>{{ $value->catagory_name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Purcase Price</label>
        <input  class="form-control" placeholder="Enter Purcase Price" id="purcase_price" name="purcase_price" value="{{ $medicine->purcase_price }}" readonly="">
      </div>
      <div class="form-group">
        <label>Retail Price</label>
        <input  class="form-control" placeholder="Enter Retail Price" id="retail_price" name="retail_price" value="{{ $medicine->retail_price }}" readonly="">
      </div>
      <div class="form-group">
        <label>Whole Sale Price</label>
        <input class="form-control" placeholder="Enter Whole Sale Price" id="whole_sell_price" name="whole_sell_price" value="{{ $medicine->whole_sell_price }}" readonly="">
      </div>
              </div>
              <div class="col-md-6">
      <div class="form-group">
        <label>Medicine Name</label>
        <input type="text" class="form-control" placeholder="Medicine Name" id="medicine_name" name="medicine_name" value="{{ $medicine->medicine_name }}" readonly="">
      </div>
               
      <div class="form-group">
        <label>Company Name</label>
        <input class="form-control" value="{{ $medicine->company_name }}" readonly="">
      </div>

      <div class="form-group">
        <label>Desk Name</label>
         <input class="form-control" value="{{ $medicine->desk_name }}" readonly="">
      </div>

      <div class="form-group">
        <label>Medicine Description</label>
        <input class="form-control" placeholder="Enter Medicine Description" id="medicine_description" name="medicine_description" value="{{ $medicine->medicine_description }}" readonly="">
      </div>
      <div class="form-group">
        <label>Status</label>
        <input class="form-control" value="{{ $medicine->medicine_status }}" readonly="">
      </div>
      </div>
    </div>
</div>
     