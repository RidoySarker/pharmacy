@extends('layouts.app')
@section('title', 'Purcase')
@section('content')
<style type="text/css">
  .details{
    float: right;
    border: 1px solid #343a40;
  }
  .title{
    height: 45px;
    width: 145px;
    text-align: center;
    background-color: #343a40;
    color: white;
    padding: 5px;
    margin-left: 15px;
  }
  .title:hover{
    background-color: white;
    color: black;
  }
</style>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>New Purcase</h1>
      </div>
    </div>
</section>
<form id="form" method="post">
  <div style="display: inline-flex;">
    <div class="title">Batch ID</div>
    <div class="title">DATE(M-D-Y)</div>
    <div class="title">COMPANY NAME</div>
    <div class="title">MEDICINE NAME</div>
  </div>

  <div style="display: -webkit-box;">
    <div class="form-group">
      <div class="col-sm-2">
          @php
          $batch_id = time();
          @endphp
        <input type="text" name="batch_id" value="{{$batch_id}}" class="form-control" style="margin-left: 6px; width: 146px;" readonly="">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-2">
        <input type="date" name="date" class="form-control date" style="margin-left: 5px; width: 142px;">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-2">
        <select class="form-control company_name" style="margin-left: 6px; width: 146px; margin-left: -2px;" name="company_name">
          <option>--SELECT--</option>
          @foreach($company as $value)
          <option value="{{ $value->company_name }}">{{ $value->company_name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-2">
        <select class="form-control medicine_name" style="margin-left: 6px; width: 146px; margin-left: -1px;">
          <option>--SELECT--</option>
        </select>
      </div>
    </div>
  </div>

    <div id="gif" style="text-align: center; display: none;"><img style="height: 200px;" src="{{asset('images/loader.gif')}}"></div>
    <div style="display: none;" id="table">
      <section class="content mt-3">
        <div class="animated fadeIn">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Purcase</h3>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Medicine Name</th>
                      <th>Medicine Code</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="medicine"></td>
                        <td class="medicine_code"></td>
                        <td>
                          <input type="text" name="" style="width: 76px;" value="1" class="form-control value_data">
                        </td>
                        <td>
                          <input type="text" name="" style="width: 76px;" class="form-control price" readonly>
                        </td>
                        <td class="amount"></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="details mt-3">
                    <table>
                      <tr>
                        <td class="title">Expire Date</td>
                        <td>
                          <input type="date" name="expire_date" class="form-control expire_date" style="height: 50px; width: 230px;" required="">
                        </td>
                      </tr>
                      <tr>
                        <td class="title">Medicine Name</td>
                        <td>
                          <input type="text" style="height: 50px; width: 230px;" name="medicine_name" class="form-control m_name" readonly>
                        </td>
                      </tr>
                      <tr>
                        <td class="title">Medicine Code</td>
                        <td>
                          <input type="text" style="height: 50px; width: 230px;" name="medicine_code" class="form-control m_code" readonly>
                        </td>
                      </tr>
                      <tr>
                        <td class="title">Quantity</td>
                        <td>
                          <input type="text" style="height: 50px; width: 230px;" name="quantity" class="form-control qty" readonly>
                        </td>
                      </tr>
                      <tr>
                        <td class="title">Subtotal</td>
                        <td>
                          <input type="text" style="height: 50px; width: 230px;" name="sub_total" class="form-control subtotal" readonly>
                        </td>
                      </tr>
                      <tr>
                        <td class="title">Grand Total</td>
                        <td>
                          <input type="text" style="height: 50px; width: 230px;" name="grand_total" class="form-control grandTotal" readonly>
                        </td>
                      </tr>
                      <tr>
                        <td class="title">Pay</td>
                        <td>
                          <input type="text" style="height: 50px; width: 230px;" name="pay" class="form-control pay">
                        </td>
                      </tr>
                      <tr>
                        <td class="title">The Rest</td>
                        <td>
                          <input type="text" style="height: 50px; width: 230px;" name="rest" class="form-control rest" readonly>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
                          <button type="submit" class="btn btn-primary submit">Save To Stock</button>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
</form>
@stop
@section('script')
<script src="custom_js/purcase.js"></script>
@endsection
