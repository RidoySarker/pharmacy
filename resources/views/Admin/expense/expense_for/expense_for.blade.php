@extends('layouts.app')
@section('title', 'Expense | Pharmacy')
@section('content')
<!DOCTYPE html>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Expense</h1>
          </div>
          <div class="col-sm-6">
            <button type="button" style="margin-left: 380px;" class="btn btn-rounded btn-primary mb-2 mr-2" id="add">Add Expense</button>
          </div>
        </div>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Expense List</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Sl No.</th>
                    <th>Expense Name</th>
                    <th>Expense Cost</th>
                    <th>Expense Date</th>
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
        <h5 class="modal-title" id="myModalLabel">Add Expense</h5>
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
        <h5 class="modal-title" id="myModalLabel">Edit Expense</h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <div id="edit_form"></div>

    </div>
  </div>
</div>
@stop
@section('script')
<script src="custom_js/expense_for.js"></script>
@endsection
