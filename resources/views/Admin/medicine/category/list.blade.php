<table id="example1" class="table table-bordered table-striped dataTable">
	<thead>
	<tr>
	  <th>Sl No.</th>
	  <th class="sorting @if($sorting==1){{'sorting_'.$sortingClick}} @endif" sorting="1">Name</th>
	  <th class="sorting @if($sorting==2){{'sorting_'.$sortingClick}} @endif" sorting="2">Description</th>
	  <th class="sorting @if($sorting==3){{'sorting_'.$sortingClick}} @endif" sorting="3">Status</th>
	  <th>Action</th>
	</tr>
	</thead>
	<tbody>
	  @foreach($category as  $value)
	  <tr>
	    <td>{{ $sl++ }}</td>
	    <td>{{ $value->catagory_name }}</td>
	    <td>{{ $value->catagory_description }}</td>
	    <td>
	      @if($value->catagory_status=='Active')
	      <span style="color: green;">{{ $value->catagory_status }}</span>
	      @else
	      <span style="color: red;">{{ $value->catagory_status }}</span>
	      @endif
	    </td>
	    <td>
	      <button class="edit btn btn-outline-primary btn-xs" data="{{ $value->catagory_id }}"><i class="fa fa-edit"></i></button>
	      <button class="delete btn btn-outline-danger btn-xs" data="{{ $value->catagory_id }}"><i class="fa fa-trash-alt"></i></button>
	    </td>
	  </tr>
	  @endforeach
	</tbody>
</table>
{{$category->links()}}