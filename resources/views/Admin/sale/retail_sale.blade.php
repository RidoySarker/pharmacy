@extends('layouts.app')
@section('title', 'Retail Sale')
@section('content')
<style type="text/css">
  .details{
    float: right;
    border: 1px solid #343a40;
    width: 412px;
  }
  .title{
    height: 45px;
    width: 200px;
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
  .stock_message{
  	float: right;
    width: 600px;
    margin-top: -35px;
    margin-left: 100px;
    text-align: center;
  }
</style>
	      <section class="content mt-3">
	        <div class="animated fadeIn">
	          <div class="row">
	            <div class="col-12">
	              <div class="card">
	                <div class="card-header">
	                  <h3><b style="color: #343a40">Retail Sale</b></h3>	
	                  <a class="btn btn-info" style="float:right;margin-top: -41px;" href="{{url('retail_sale_report')}}">Retail Sale Report</a> 
	                </div>
	                <div class="card-body">
		                <form id="form" method="post">
							  <div style="display: inline-flex; margin-left: -14px;">
							    <div class="title">DATE(M-D-Y)</div>
							    <div class="title" style="margin-left: 12px;">Customer Name</div>
							  </div>

							  <div style="display: -webkit-box; margin-left: -14px;">
							    <div class="form-group">
							      <div class="col-sm-2">
							        <input type="date" name="date" class="form-control date" style="margin-left: 6px; width: 200px;">
							      </div>
							    </div>
							    <div class="form-group">
							      <div class="col-sm-2">
							      	<input type="text" class="form-control" name="customer_name" style="margin-left: -2px; width: 201px;">
							      </div>
							    </div>
							    <div class="stock_message"></div>
							    <input type="hidden" id="totalstock">
							 </div>
							<div style="display: inline-flex; margin-left: -14px;">
							    <div class="title">Medicine Name</div>
							    <div class="title" style="margin-left: 12px;">Price</div>
							    <div class="title" style="margin-left: 12px;">Quantity</div>
							    <div class="title" style="margin-left: 12px;">Subtotal</div>
							    <div class="title" style="margin-left: 12px;">Add More Field</div>
							</div>
		                  <table>	                      
		                    <tr>
		                        <td>
		                        	<select id="select-state" class="form-control medicine_code" name="medicine_code[]" style="width: 201px;">
		                        		<option value="">Select Medicine</option>
		                        		@foreach($medicine as $value)
		                        		<option value="{{ $value->medicine_code }}">{{ $value->medicine_name }}</option>
		                        		@endforeach
		                        	</select>
		                        </td>
		                        <td>
		                        	<input type="text" class="form-control price" style="margin-left: 9px; width: 201px;" readonly>
		                        </td>
		                        <td>
		                          <input type="text" class="form-control quantity" name="quantity[]" style="margin-left: 9px; width: 201px;">
		                        </td>
		                        <td>
		                          <input type="text" class="form-control sub_total" name="sub_total[]" style="margin-left: 9px; width: 201px;" readonly>
		                        </td>
		                        <td>
		                        	<button class="btn btn-success add_field" style="margin-left: 8px; width: 201px;">Add More Field</button>
		                        </td>
		                    </tr>
		                  </table>
		                  <div class="input_field"></div>
		                  <div class="details mt-3">
		                    <table>
		                      <tr>
		                        <td class="title">Invoice Id</td>
		                        <td>
		                          @php
		                          $invoice_id = time();
		                          @endphp
		                          <input type="text" style="height: 50px; width: 208px;" name="invoice_id" value="{{ $invoice_id }}" class="form-control" readonly>
		                        </td>
		                      </tr>
		                      <tr>
		                        <td class="title">Grand Total</td>
		                        <td>
		                          <input type="text" style="height: 50px; width: 208px;" name="grand_total" class="form-control grandTotal" readonly>
		                        </td>
		                      </tr>
		                      <tr>
		                        <td class="title">Pay</td>
		                        <td>
		                          <input type="text" style="height: 50px; width: 208px;" name="payment" class="form-control pay">
		                        </td>
		                      </tr>
		                      <tr>
		                        <td></td>
		                        <td>
		                          <button type="submit" style="margin-left: -2px; width: 80px" class="btn btn-success submit">Sale</button>
		                        </td>
		                      </tr>
		                    </table>
		                  </div>
		              	</form>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	      </section>
@stop
@section('script')


<script type="text/javascript">
	$(document).ready(function(){

          $('select').selectize({
            sortField: 'text'
        });
		var now = new Date();
		var day = ("0" + now.getDate()).slice(-2);
		var month = ("0" + (now.getMonth() + 1)).slice(-2);
		var today = now.getFullYear()+"-"+(month)+"-"+(day);
		$(".date").val(today);

		var max_field = 20;
		var wrapper = $(".input_field");
		var add_field = $(".add_field");
		var i = 1;
		
		$(add_field).click(function(e) {
		e.preventDefault();
		if(i < max_field) {
			i++;
			$(wrapper).append("<div>\
				<table>\
		                    <tr>\
		                        <td>\
		                        	<select id='select-state' class='form-control medicine_code' name='medicine_code[]' style='width: 201px;'>\
		                        		<option value=''>Select Medicine</option>\
		                        		@foreach($medicine as $value)\
		                        		<option value='{{ $value->medicine_code }}'>{{ $value->medicine_name }}</option>\
		                        		@endforeach\
		                        	</select>\
		                        </td>\
		                        <td>\
		                        	<input type='text' class='form-control price' style='margin-left: 9px; width: 201px;' readonly>\
		                        </td>\
		                        <td>\
		                          <input type='text' class='form-control quantity', name='quantity[]' style='margin-left: 9px; width: 201px;'>\
		                        </td>\
		                        <td>\
		                          <input type='text' class='form-control sub_total' name='sub_total[]' style='margin-left: 9px; width: 201px;' readonly>\
		                        </td>\
		                        <td>\
		                        	<button class='btn btn-danger remove_field' style='margin-left: 8px; width: 201px;'>Remove</button>\
		                        </td>\
		                    </tr>\
		                  </table>\</div>");
				}
		      $('select').selectize({
	          sortField: 'text'
	      });
	});
	$(wrapper).on("click", ".remove_field", function(e) {
		e.preventDefault(); 
		$(this).closest('div').remove(); i--;
	});

	$(document).on("change", ".medicine_code", function() {
		var medicine_code = $(this).val();
		var row = $(this).closest("tr");

		$.ajax({
			url: "/all_medicine/"+medicine_code,
			success: function(data) {
				var totalstock = Object.keys(data).length;
				$("#totalstock").val(totalstock);
				if(totalstock>0) {
					row.find(".price").val(data[0].retail_price);
					$(".stock_message").html("<font id='stoks' style='color:green;font-size: 25px;'>"+totalstock+" Medicine in Stock</font>")
				} else {
					$(".stock_message").html("<font style='color:red;font-size: 25px;'>Medicine Out of Stock</font>")
				}
			}
		});
	});

	$(document).on("keyup", ".quantity", function() {
		var totalstock = parseInt($("#totalstock").val());
		var quantity = $(this).val();
		if (quantity <= totalstock) {
			$(".submit").attr("disabled", false);
			var price = $(this).closest("tr").find(".price").val();
			var sub_total = parseInt(quantity*price);
			$(this).closest("tr").find(".sub_total").val(sub_total);
			var total = 0;
			$(".sub_total").each(function() {
				var value = parseInt($(this).val());
				total = parseInt(total+value)
				$(".grandTotal").val(total);
			});
		} 
		else {
			$(".submit").attr("disabled", true);
		}
		
	});

	$(document).on("submit", "#form", function(e) {
		e.preventDefault();
		var data = $(this).serializeArray();
		$.ajax({
			url		: "retail_sale/store",
			data 	: data,
			type    : "post",
			dataType: "json",
			success: function(data) {
				if (data.msgtype=='success') {
	              toastr["success"](data.message);
	              setTimeout(function(){location.reload();},900);
	              $("#form").trigger( "reset" );
	            } else {
	              toastr["error"]("Something Went Wrong");
	            }
			}, error: function(errors) {
			var text=errors.responseText;
			var error=JSON.parse(text);
			toastr["error"](error.message);
		}
		});
	});




	});
</script>

@endsection
