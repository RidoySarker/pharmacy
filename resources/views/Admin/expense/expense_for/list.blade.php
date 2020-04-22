<table id="example1" class="table table-bordered table-striped dataTable">
	<thead>
	  <tr>
	    <th>Sl No.</th>
	    <th class="sorting @if($sorting==1){{'sorting_'.$sortingClick}} @endif" sorting="1">Expense Name</th>
	    <th class="sorting @if($sorting==2){{'sorting_'.$sortingClick}} @endif" sorting="2">Expense Cost</th>
	    <th class="sorting @if($sorting==3){{'sorting_'.$sortingClick}} @endif" sorting="3">Expense Date</th>
	    <th>Action</th>
	  </tr>
	</thead>
	<tbody>
	  @foreach($expensefor as $key => $value)
	  <tr>
	    <td>{{ $key+1 }}</td>
	    <td>{{ $value->expense_name }}</td>
	    <td>{{ $value->expense_cost }}</td>
	    <td>{{ $value->expense_date }}</td>
	    <td>
	      <button class="edit btn btn-outline-primary btn-xs" data="{{ $value->expense_for_id }}"><i class="fa fa-edit"></i></button>
	      <button class="delete btn btn-outline-danger btn-xs" data="{{ $value->expense_for_id }}"><i class="fa fa-trash-alt"></i></button>
	    </td>
	  </tr>
	  @endforeach
	</tbody>
</table>
{{$expensefor->links()}}