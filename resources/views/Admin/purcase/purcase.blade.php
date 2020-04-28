@extends('layouts.app')
@section('title', 'Purcase Medicine')
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
  .message{
    float: right;
    width: 200px;
    margin-top: -65px;
    margin-left: 429px;
    text-align: center;
  }
</style>

        <section class="content mt-3">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3><b style="color: #343a40">Purcase Medicine</b></h3>
                    <a class="btn btn-info" style="float:right;margin-top: -41px;" href="{{route('purcase.create')}}">Purcase Report</a> 
                  </div>
                  <div class="card-body">
                    <form id="form" method="post">
                <div style="display: inline-flex; margin-left: -14px;">
                   <div class="title" style="width: 141px;">Batch ID</div>
                  <div class="title" style="width: 141px;">Date (M-D-Y)</div>
                </div>

                <div style="display: -webkit-box; margin-left: -7px;">
                  <div class="form-group">
                    <div class="col-sm-2">
                      @php
                      $batch_id = time();
                      @endphp
                      <input type="text" name="batch_id" value="{{$batch_id}}" class="form-control" style=" width: 141px;" readonly="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <input type="date" name="date" class="form-control date" style="margin-left: 1px; width: 141px;">
                    </div>
                  </div>
               </div>
              <div style="display: inline-flex; margin-left: -14px;">
                  <div class="title" style="margin-left: 10px;width: 141px; ">Company Name</div>
                  <div class="title" style="width: 141px;">Medicine Name</div>
                  <div class="title" style="margin-left: 12px; width: 141px;">Price</div>
                  <div class="title" style="margin-left: 14px; width: 141px;">Expire Date*</div>
                  <div class="title" style="margin-left: 12px; width: 141px;">Quantity*</div>
                  <div class="title" style="margin-left: 12px; width: 141px;">Subtotal</div>
                  <div class="title" style="margin-left: 12px; width: 141px;">Add More Field</div>
              </div>
                      <table>                       
                        <tr>
                            <td>
                      <select name="company_name[]" class="form-control company_name" style="margin-left: -4px; width: 141px;">
                        <option value="" hidden="">Select Company</option>
                       @foreach($company as $value)
                        <option value="{{ $value->company_name }}">{{ $value->company_name }}</option>
                        @endforeach
                      </select>
                            </td>
                            <td>
                              <select name="medicine_code[]" class="form-control medicine_name" style="margin-left: 12px; width: 141px;">
                                <option value="" hidden="">Select Medicine</option>
                                
                              </select>
                            </td>
                            <td>
                              <input type="text" class="form-control price" style="margin-left: 10px; width: 141px;" readonly>
                            </td>
                            <td>
                          <input type="date" name="expire_date[]" class="form-control expire_date" style="margin-left: 11px; width: 141px;" required="">
                            </td>
                            <td>
                              <input type="text" class="form-control quantity" name="quantity[]" style="margin-left: 11px; width: 141px;">
                            </td>
                            <td>
                              <input type="text" class="form-control sub_total" name="sub_total[]" style="margin-left: 10px; width: 141px;" readonly>
                            </td>
                            <td>
                              <button class="btn btn-success add_field" style="margin-left: 10px; width: 141px;">Add More Field</button>
                            </td>
                        </tr>
                      </table>
                      <div class="input_field"></div>
                      <div class="details mt-2" style="margin-right: -11px;">
                        <table>
                        <tr>
                        <td class="title">Grand Total</td>
                        <td>
                          <input type="text" style="height: 40px; width: 230px;" name="grand_total" class="form-control grandTotal" readonly>
                        </td>
                      </tr>
                      <tr>
                        <td class="title">Pay</td>
                        <td>
                          <input type="text" style="height: 40px; width: 230px;" name="pay" class="form-control pay">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <input type="text" style="height: 40px; width: 230px;" name="stock_status" value="Active" class="form-control status" hidden>
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
    $(".submit").attr("disabled", true);
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
                              <select name='company_name[]' class='form-control company_name' style='margin-left: -3px; width: 141px;'>\
                              @foreach($company as $value)\
                                <option hidden>Select Company</option>\
                                <option value='{{ $value->company_name }}'>{{ $value->company_name }}</option>\
                                @endforeach\
                              </select>\
                            </td>\
                            <td>\
                              <select name='medicine_code[]' class='form-control medicine_name' style='margin-left: 12px; width: 141px;'>\
                                <option hidden>Select Medicine</option>\
                              </select>\
                            </td>\
                            <td>\
                              <input type='text' class='form-control price' style='margin-left: 9px; width: 141px;' readonly>\
                            </td>\
                            <td>\
                              <input type='date' name='expire_date[]' class='form-control expire_date' style='margin-left: 11px; width: 141px;' required>\
                            </td>\
                            <td>\
                              <input type='text' class='form-control quantity', name='quantity[]' style='margin-left: 11px; width: 141px;'>\
                            </td>\
                            <td>\
                              <input type='text' class='form-control sub_total' name='sub_total[]' style='margin-left: 10px; width: 141px;' readonly>\
                            </td>\
                            <td>\
                              <button class='btn btn-danger remove_field' style='margin-left: 10px; width: 141px;'>Remove</button>\
                            </td>\
                        </tr>\
                      </table>\</div>");
    }
  });
  $(wrapper).on("click", ".remove_field", function(e) {
    e.preventDefault(); 
    $(this).closest('div').remove(); i--;
  });

  $(document).on("change", ".company_name", function() {
  var company = $(this).val();

  $.ajax({
    url : "/medicine_name/"+company,
    success: function(data) {
      for (var i =0; i<=data.length; i++) {
        $(".medicine_name").append('<option value='+data[i].medicine_code+'>'+data[i].medicine_name+'</option>')
      }
    }
  });
});

  $(document).on("change", ".medicine_name", function() {
  var medicine = $(this).val();
  var row = $(this).closest("tr");

  $.ajax({
    url : "/medicine_list/"+medicine,
    success: function(data) {
      if(data) {
        $(".medicine_code").html(data[0].medicine_code);
        $(".m_code").val(data[0].medicine_code);
        row.find(".price").val(data[0].purcase_price);
      }
    }
  });
});

$(document).on("keyup" , ".quantity",function(){
    var quantity = $(this).val();
      var price = $(this).closest("tr").find(".price").val();
      var sub_total = parseInt(quantity*price);
      $(this).closest("tr").find(".sub_total").val(sub_total);
      var total = 0;
      $(".sub_total").each(function() {
        var value = parseInt($(this).val());
        total = parseInt(total+value)
        $(".grandTotal").val(total);
      });
    
  });


$(".pay").keyup(function() {
  var pay = $(this).val();
  var grandTotal = $(".grandTotal").val();
  if(pay==grandTotal) {
    $(".submit").attr("disabled", false);
  }
});

$("#form").submit(function(e) {
  e.preventDefault();
  var data = $(this).serializeArray();
  
  $.ajax({
    url     : "purcase/store",
    data    : data,
    type    : "post",
    dataType: "json",
    success: function(data) {
      if(data.msgtype=="success") {
        toastr["success"](data.message);
        setTimeout(function(){location.reload();},900);
        $("#form").trigger( "reset" );
      } else {
        toastr["error"]("Something Went Wrong");
      }
    }, error: function(errors) {
      var text=errors.responseText;
      var error=JSON.parse(text);
      $("#modal_form").find(".alert-danger").remove();
      $("#form").find("#error").prepend("<div class='alert alert-danger'>"+error.message+"</div>");
    }
  });
});
//Delete
$(".delete").click(function() {
  var data = $(this).attr("data");

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this data!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url     : "/purcase/"+data,
          type    : "delete",
          dataType: "json",
          success: function(data) {
            if (data.msgtype=='success') {
              toastr["success"](data.message);
              setTimeout(function(){location.reload();},900);
            } else {
              toastr["error"]("Something Went Wrong");
            }
          }
        });
        } else { 
            swal("Your Data is safe!");
        }
    });
});

</script>
@endsection
