<table id="example1" class="table table-bordered table-striped dataTable">
	<thead>
		<tr>
		  <th>Sl No.</th>
		  <th class="sorting @if($sorting==1){{'sorting_'.$sortingClick}} @endif" sorting="1">Name</th>
		  <th class="sorting @if($sorting==2){{'sorting_'.$sortingClick}} @endif" sorting="2">Code</th>
		  <th class="sorting @if($sorting==3){{'sorting_'.$sortingClick}} @endif" sorting="3">Description</th>
		  <th>Action</th>
		</tr>
	</thead>
	<tbody>
	  @foreach($desk as $value)
	  <tr>
	    <td>{{ $sl++ }}</td>
	    <td>{{ $value->desk_name }}</td>
	    <td>{{ $value->desk_code }}</td>
	    <td>{{ $value->desk_description }}</td>
	    <td>
	      <button class="edit btn btn-outline-primary btn-xs" data="{{ $value->desk_id }}"><i class="fa fa-edit"></i></button>
	      <button class="delete btn btn-outline-danger btn-xs" data="{{ $value->desk_id }}"><i class="fa fa-trash-alt"></i></button>
	    </td>
	  </tr>
	  @endforeach
	</tbody>
</table>
{{$desk->links()}}