@extends('layouts.app')
@section('title', 'Medicne Wise Report')
@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Medicne Wise Report</h1>
          </div>
        </div>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Medicne Wise Report List</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>Date</th>
	                  <th>Company Name</th>
	                  <th>Medicine Name</th>
	                  <th>Quantity</th>
	                  <th>Total</th>
	                  <th>Pay</th>
	                  <th>Rest</th>
	                  <th>Action</th>
	                </tr>
                </thead>
                <tbody>
	              @foreach($report_data as $key => $value)
	              <tr>
	                <td>{{ $value->date }}</td>
	                <td>{{ $value->company_name }}</td>
	                <td>
	                	@php
	                	$medicine_name=DB::table('medicines')->where('medicine_code',$value->medicine_code)->first();
	                	@endphp
	                	{{ $medicine_name->medicine_name }}
	                </td>
	                <td>{{ $value->quantity }}</td>
	                <td>{{ $value->grand_total }}</td>
	                <td>{{ $value->pay }}</td>
	                <td>
	                	@if($value->rest==0)
	                	<font color="green">You have no rest</font>
	                	@else
	                	<font color="red">You have {{ $value->rest }} TK rest</font>
	                	@endif
	                </td>
	                <td>
	                  <button class="edit btn btn-outline-primary btn-xs" data="{{ $value->purcase_id }}"><i class="fa fa-edit"></i></button>
	                  <button class="delete btn btn-outline-danger btn-xs" data="{{ $value->purcase_id }}"><i class="fa fa-trash-alt"></i></button>
	                </td>
	              </tr>
	              @endforeach
                </tbody>
					<td colspan="8" class="text-center" style="font-size: 30px;color: green;">
						Total Stock : {{$stock_report ? collect($stock_report)->count('batch_id') :'NOT PURCASE YET'}}
					</td>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div id="edit_form"></div>

    </div>
  </div>
</div>
@stop
@section('script')
<script src="/custom_js/purcase.js"></script>
@endsection
