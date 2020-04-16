@extends('layouts.app')
@section('title', 'Out Of Stock')
@section('content')
<div class="card">
	<div class="card-header">
	                  <h4><b style="color: #343a40"><i class="btn-outline-success far fa-clipboard fa-2x"></i> Stock</b></h4>	
	                  <span style="margin-left: 45px;">Out Of Stock</span>

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
	                  <th>Stock</th>
	                </tr>
                </thead>
                <tbody>
	             @foreach($stock_data as $key => $value)
	             @php $medicine_data=DB::table('medicines')->where('medicine_code',$value->medicine_code)->first(); 

	             @endphp
	              <tr>
	                <td>{{$key+1}}</td>
	                <td>{{$medicine_data->medicine_name}}</td>
					         <td>{{$medicine_data->company_name}}</td>
	                <td>{{$medicine_data->medicine_code}}</td>
	                <td>{{$value->total_stock}}</td>
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
