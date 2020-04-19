@extends('layouts.app')
@section('title', 'Daily Report')
@section('content')
<section class="content-header">
<div class="card">
  <div class="card-header">
  <h1 class="card-title">Daily Report</h1>
</div>
</div>
</section>


<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Today Whole Sale List</h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Date</th>
              <th>Invoice ID</th>
              <th>Customer Name</th>
              <th>Total Amount</th>
            </tr>
            </thead>
            <tbody>
              @foreach($today_w_s as $key => $value)
              <tr>
                <td>{{ $value->date }}</td>
                <td>{{ $value->invoice_id }}</td>
                <td>{{ $value->customer_name }}</td>
                <td id="total">{{ $value->grand_total }}</td>
              </tr>
              @endforeach
            </tbody>
            <td colspan="2"></td>
            <td class="text-right">Total Amount:</td>
            <td>{{ collect($today_w_s)->sum('grand_total') }}</td>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Today Retail Sale List</h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Date</th>
              <th>Invoice ID</th>
              <th>Customer Name</th>
              <th>Total Amount</th>
            </tr>
            </thead>
            <tbody>
              @foreach($today_r_s as $key => $value)
              <tr>
                <td>{{ $value->date }}</td>
                <td>{{ $value->invoice_id }}</td>
                <td>{{ $value->customer_name }}</td>
                <td>{{ $value->grand_total }}</td>
              </tr>
              @endforeach
            </tbody>
            <td colspan="2"></td>
            <td class="text-right">Total Amount:</td>
            <td>{{ collect($today_r_s)->sum('grand_total') }}</td>
          </table>
        </div>
      </div>
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
              <th>Date</th>
              <th>Expense Name</th>
              <th>Expense Cost</th>
            </tr>
            </thead>
            <tbody>
              @foreach($expense as $key => $value)
              <tr>
                <td>{{ $value->expense_date }}</td>
                <td>{{ $value->expense_name }}</td>
                <td>{{ $value->expense_cost }}</td>
              </tr>
              @endforeach
            </tbody>
            <td colspan="1"></td>
            <td class="text-right">Total Amount:</td>
            <td>{{ collect($expense)->sum('expense_cost') }}</td>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

@stop