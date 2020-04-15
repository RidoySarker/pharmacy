@extends('layouts.app')
@section('title', 'Whole Sale Report')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <form id="form" method="post">
          <div>
            <h4 style="margin-left: 110px;"><b>Date Range</b><h4>
          </div>
          <div style="display: -webkit-box;">
            <div class="form-group">
              <div class="col-sm-2">
                <input type="date" name="date1" class="form-control date1" style="margin-left: 7px; width: 146px;">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-2">
                <input type="date" name="date2" class="form-control date2" style="margin-left: 9px; width: 146px;">
              </div>
            </div>
          <button class="btn btn-outline-success">Submit</button>
          </div>
        </form>
      </div>
    </div>
</section>
<div id="gif" style="text-align: center; display: none;"><img style="height: 200px;" src="{{asset('images/loader.gif')}}"></div>
<section class="content" id="table" style="display: none;">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          
          <div id="dataList"></div>

        </div>
      </div>
    </div>
  </div>
</section>
@stop
@section('script')
<script src="custom_js/whole_sale_report.js"></script>
@endsection