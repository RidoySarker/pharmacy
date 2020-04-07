<form id="edit_form" method="post">
    <div class="modal-body">
      <div class="form-group">
        <label>Expense Catagory Name</label>
        <input type="text" class="form-control" placeholder="Enter Expense Catagory Name" id="expense_name" name="expense_name" value="{{$expense->expense_name}}">
      </div>
      <input type="hidden" class="form-control" id="expense_catagory_id" name="expense_catagory_id" value="{{ $expense->expense_catagory_id }}">
      <div class="form-group">
        <label>Expense Description</label>
        <textarea id="expense_description" name="expense_description" class="form-control" placeholder="Expense Description">{{$expense->expense_description}}</textarea>
      </div>
      <div class="form-group">
        <label>Expense Status</label>
        <select class="form-control" name="expense_status" id="expense_status">
          <option value="Active" {{$expense->expense_status=='Active' ? 'selected' : ''}}>Active</option>
          <option value="Inactive" {{$expense->expense_status=='Inactive' ? 'selected' : ''}}>Inactive</option>
        </select>
      </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>

