@extends('layouts.app')
@section('title', 'Company')
@section('content')
<section class="content-header">
<div class="card">
  <div class="card-header">
  <h1 class="card-title">Company</h1>

 
    <button type="button" style="float:right;" class="btn btn-info btn-sm" id="add">Add New</button>

</div>
</div>
</section>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Company List</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Sl No.</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($company as $key => $value)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $value->company_name }}</td>
                    <td>{{ $value->company_phone }}</td>
                    <td>{{ $value->company_email }}</td>
                    <td>{{ $value->company_address }}</td>
                    <td>
                      @if($value->company_status=='Active')
                      <span style="color: green;">{{ $value->company_status }}</span>
                      @else
                      <span style="color: red;">{{ $value->company_status }}</span>
                      @endif 
                    </td>
                    <td>
                      <button class="edit btn btn-outline-primary btn-xs" data="{{ $value->company_id }}"><i class="fa fa-edit"></i></button>
                      <button class="delete btn btn-outline-danger btn-xs" data="{{ $value->company_id }}"><i class="fa fa-trash-alt"></i></button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Add Company</h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <div id="add_form"></div>

    </div>
  </div>
</div>

<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Edit Company</h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <div id="edit_form"></div>

    </div>
  </div>
</div>
@stop
@section('script')
<script src="custom_js/company.js"></script>
@endsection
