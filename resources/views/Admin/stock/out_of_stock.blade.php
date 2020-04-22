@extends('layouts.app') @section('title', 'Out Of Stock') @section('content')
<div class="card">
<div class="card-header">
<h4><b style="color: #343a40"><i class="btn-outline-success far fa-clipboard fa-2x"></i>Out Of Stock</b></h4>
</div>
</div>

<section class="content">
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Out Of Stock</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Medicine Name</th>
                        <th>Company Name</th>
                        <th>Medicine Code</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl=1; @endphp
                    @foreach($Purcase as $key => $value)
                    @php 

                     $stock = collect($stocks_data)->where('medicine_code',$value->medicine_code)->where('stock_status', 'Active')->count();

                     $medicine_data = collect($Medicine)->where('medicine_code',$value->medicine_code)->first(); 
                     
                    @endphp
                        @if($stock<=0) 
                        <tr>
                          <td>{{$sl++}}</td>
                          <td>{{$medicine_data->medicine_name}}</td>
                          <td>{{$medicine_data->company_name}}</td>
                          <td>
                              <strong><span style="color: red">{{$stock}}</span></strong>
                          </td>
                        </tr>
                        @endif
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</section>
</div>
@stop