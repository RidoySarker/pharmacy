<table id="example1" class="table table-bordered table-striped dataTable">
	<thead>
	  <tr>
	    <th>Sl No.</th>
	    <th class="sorting @if($sorting==1){{'sorting_'.$sortingClick}} @endif" sorting="1">Customer Name</th>
	    <th class="sorting @if($sorting==2){{'sorting_'.$sortingClick}} @endif" sorting="2">Customer Phone</th>
	    <th class="sorting @if($sorting==3){{'sorting_'.$sortingClick}} @endif" sorting="3">Customer Address</th>
	    <th class="sorting @if($sorting==4){{'sorting_'.$sortingClick}} @endif" sorting="4">Status</th>
	    <th>Action</th>
	  </tr>
	</thead>
	<tbody>
	  @foreach($customer as $value)
	  <tr>
	    <td>{{ $sl++ }}</td>
	    <td>{{ $value->customer_name }}</td>
	    <td>{{ $value->customer_phone }}</td>
	    <td>{{ $value->customer_address }}</td>
	    <td>
	      @if($value->customer_status=='Active')
	      <span style="color: green;">{{ $value->customer_status }}</span>
	      @else
	      <span style="color: red;">{{ $value->customer_status }}</span>
	      @endif 
	    </td>
	    <td>
	      <button class="edit btn btn-outline-primary btn-xs" data="{{ $value->customer_id }}"><i class="fa fa-edit"></i></button>
	      <button class="delete btn btn-outline-danger btn-xs" data="{{ $value->customer_id }}"><i class="fa fa-trash-alt"></i></button>
	    </td>
	  </tr>
	  @endforeach
	</tbody>
</table>
{{$customer->links()}}