<form id="modal_form" method="post">
    <div class="modal-body">
      <div class="form-group">
        <label>Expense Catagory Name</label>
        <input type="text" class="form-control" placeholder="Enter Expense Catagory Name" id="expense_name" name="expense_name">
      </div>
      <div class="form-group">
        <label>Expense Description</label>
        <textarea id="expense_description" name="expense_description" class="form-control" placeholder="Expense Description"></textarea>
      </div>
      <div class="form-group">
        <label>Expense Status</label>
        <select class="form-control" name="expense_status" id="expense_status">
          <option value="Active">Active</option>
          <option value="Inactive">Inactive</option>
        </select>
      </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
