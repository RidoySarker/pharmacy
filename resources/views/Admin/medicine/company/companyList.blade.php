<table id="example1" class="table table-bordered table-striped dataTable">
    <thead>
        <tr>
            <th>Sl No.</th>
            <th class="sorting @if($sorting==1){{'sorting_'.$sortingClick}} @endif" sorting="1">Name</th>
            <th class="sorting @if($sorting==2){{'sorting_'.$sortingClick}} @endif" sorting="2">Phone</th>
            <th class="sorting @if($sorting==3){{'sorting_'.$sortingClick}} @endif" sorting="3">Email</th>
            <th class="sorting @if($sorting==4){{'sorting_'.$sortingClick}} @endif" sorting="4">Address</th>
            <th class="sorting @if($sorting==5){{'sorting_'.$sortingClick}} @endif" sorting="5">Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($company as $value)
        <tr>
            <td>{{ $sl++ }}</td>
            <td>{{ $value->company_name }}</td>
            <td>{{ $value->company_phone }}</td>
            <td>{{ $value->company_email }}</td>
            <td>{{ $value->company_address }}</td>
            <td>
                @if($value->company_status=='Active')
                <span style="color: green;">{{ $value->company_status }}</span> @else
                <span style="color: red;">{{ $value->company_status }}</span> @endif
            </td>
            <td>
                <button class="edit btn btn-outline-primary btn-xs" data="{{ $value->company_id }}"><i class="fa fa-edit"></i></button>
                <button class="delete btn btn-outline-danger btn-xs" data="{{ $value->company_id }}"><i class="fa fa-trash-alt"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$company->links()}}