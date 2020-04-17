@extends('layouts.app')
@section('title', 'Daily Sale Report')
@section('content')
<section class="content-header">
<div class="card">
  <div class="card-header">
  <h1 class="card-title">Daily Sale Report</h1>
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
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@stop