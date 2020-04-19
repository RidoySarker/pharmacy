@extends('layouts.app')
@section('title', 'Stock Report | Pharmacy')
@section('content')
<!DOCTYPE html>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Stock Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="btn btn-info" href="/purcase">Purcase</a></li>  &nbsp;
              <li class=""><a class="btn btn-info" href="/medicine_report">Medicne Wise Stock</a> </li>
            </ol>
          </div>


        </div>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Stock Report</h3>

            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Sl No.</th>
                    <th>Company Name</th>
                    <th>Medicine Name</th>
                    <th>Total Stock</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($medicine_data as $key => $value)
                  @php

                  $stock = collect($stock_data)->where('medicine_code',$value->medicine_code)->count();
                  @endphp
                  <tr> 
                    <td>{{$key+1}}</td>
                    <td>{{$value->company_name}}</td>
                    <td>{{$value->medicine_name}}</td>
                    <td>
                      @if($stock>10)
                        <span style="color: green">{{$stock}}</span>
                      @else
                         <span style="color: red">{{$stock}}</span>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
          <td colspan="4" class="text-center" style="font-size: 30px;color: green;">
                Total Stock : {{$stock_data ? collect($stock_data)->count('batch_id') :'NOT PURCASE YET'}}
          </td>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@stop