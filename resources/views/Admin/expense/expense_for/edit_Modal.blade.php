<form id="edit_form" method="post">
    <div class="modal-body">
      <div class="form-group">
        <label>Expense Catagory Name</label>
        <select class="form-control" id="expense_name" name="expense_name">
          <option hidden>Select Catagory</option>
          @foreach($expense_catagory as $value)
          <option value="{{$value->expense_name}}" {{$value->expense_name==$expense->expense_name ? 'selected' : '' }}>{{$value->expense_name}}</option>
          @endforeach
        </select>
      </div>
      <input type="hidden" class="form-control" id="expense_for_id" name="expense_for_id" value="{{ $expense->expense_for_id }}">
      <div class="form-group">
        <label>Expense Cost</label>
        <input type="text" class="form-control" placeholder="Enter Expense Cost" id="expense_cost" name="expense_cost" value="{{ $expense->expense_cost }}">
      </div>
      <div class="form-group">
        <label>Expense Date</label>
        <input type="date" class="form-control" placeholder="Enter Expense Catagory Name" id="expense_date" name="expense_date" value="{{ $expense->expense_date }}">
      </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>

