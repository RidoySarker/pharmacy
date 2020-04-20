@extends('layouts.app')
@section('title', 'Out Of Stock')
@section('content')
<div class="card">
	<div class="card-header">
    <h4><b style="color: #343a40"><i class="btn-outline-success far fa-clipboard fa-2x"></i> Out Of Stock</b></h4>

  </div>
</div>

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Out Of Date</h3>
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
    	            @foreach($medicine as $key => $value)
  	              <tr>
  	                <td>{{$key+1}}</td>
  	                <td>{{$value->medicine_name}}</td>
  					        <td>{{$value->company_name}}</td>
  	                <td>{{$value->medicine_code}}</td>	                
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
@stop
@section('script')
<script src="/custom_js/purcase.js"></script>
@endsection
