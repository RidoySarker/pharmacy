<table id="example1" class="table table-bordered table-striped dataTable">
	<thead>
	  <tr>
	    <th>Sl No.</th>
	    <th class="sorting @if($sorting==1){{'sorting_'.$sortingClick}} @endif" sorting="1">Expense Name</th>
	    <th class="sorting @if($sorting==2){{'sorting_'.$sortingClick}} @endif" sorting="2">Expense Description</th>
	    <th class="sorting @if($sorting==3){{'sorting_'.$sortingClick}} @endif" sorting="3">Status</th>
	    <th>Action</th>
	  </tr>
	</thead>
	<tbody>
	  @foreach($expense as $value)
	  <tr>
	    <td>{{ $sl++}}</td>
	    <td>{{ $value->expense_name }}</td>
	    <td>{{ $value->expense_description }}</td>
	    <td>
	      @if($value->expense_status=='Active')
	      <span style="color: green;">{{ $value->expense_status }}</span>
	      @else
	      <span style="color: red;">{{ $value->expense_status }}</span>
	      @endif 
	    </td>
	    <td>
	      <button class="edit btn btn-outline-primary btn-xs" data="{{ $value->expense_catagory_id }}"><i class="fa fa-edit"></i></button>
	      <button class="delete btn btn-outline-danger btn-xs" data="{{ $value->expense_catagory_id }}"><i class="fa fa-trash-alt"></i></button>
	    </td>
	  </tr>
	  @endforeach
	</tbody>
</table>
{{$expense->links()}}