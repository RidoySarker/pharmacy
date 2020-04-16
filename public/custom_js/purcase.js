		var now = new Date();
		var day = ("0" + now.getDate()).slice(-2);
		var month = ("0" + (now.getMonth() + 1)).slice(-2);
		var today = now.getFullYear()+"-"+(month)+"-"+(day);
		$(".date").val(today);


$(".company_name").unbind().change(function() {
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

$(".medicine_name").change(function() {
	$("#gif").show();
	var medicine = $(this).val();
	var quantity = $(".value_data").val();

	$.ajax({
		url : "/medicine_list/"+medicine,
		success: function(data) {
			if(data) {
				$("#table").fadeIn(2000);
				$("#gif").hide();
				$(".medicine").html(data[0].medicine_name);
				$(".m_name").val(data[0].medicine_name);
				$(".medicine_code").html(data[0].medicine_code);
				$(".m_code").val(data[0].medicine_code);
				$(".price").val(data[0].purcase_price);
				$(".qty").val(quantity);
				$(".amount").html(data[0].purcase_price*quantity);
				$(".subtotal").val(data[0].purcase_price*quantity);
				$(".grandTotal").val(data[0].purcase_price*quantity);
			}
		}
	});
});

$(".value_data").unbind().keyup(function() {
	var quantity = $(this).val();
	var price = $(".price").val();

	if(quantity<=0) {
		toastr["warning"]("Quantity Value Is Null!");
		$(".amount").html('');
		$(".qty").val('');
		$(".subtotal").val('');
		$(".grandTotal").val('');
		$(".submit").attr("disabled", true);
	} else {
		var amount = parseInt(quantity*price);
		$(".amount").html(amount);
		$(".qty").val(quantity);
		$(".subtotal").val(amount);
		$(".grandTotal").val(amount);
		$(".submit").attr("disabled", false);
	}
});

$(".pay").keyup(function() {
	var pay = $(this).val();
	var grandTotal = $(".grandTotal").val();
	var rest = parseInt(grandTotal-pay);
	$(".rest").val(rest);
	if(pay<0) {
		toastr["info"]("Pay Your Bill!");
		$(".submit").attr("disabled", true);
	} else {
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

$(".edit").click(function() {
    var data = $(this).attr("data");

    $.ajax({
        url     : "/purcase/"+data+"/edit",
        type    : "get",
        dataType: "html",
        success: function(data) {
            $("#edit_form").html(data);
            $(".submit").attr("disabled", true);
        }
    });
    $("#editModal").modal();
});

$("#edit_form").on("keyup", ".now_pay", function() {
	var now_pay = $(this).val();
	var pay = $(".pay").val();
	var grandTotal = $(".grandTotal").val();
	if(now_pay<=0) {
		$(".submit").attr("disabled", true);
	} else {
		var new_pay = parseInt(pay)+parseInt(now_pay);
		var new_rest = parseInt(grandTotal)-parseInt(new_pay);
		$(".rest").val(new_rest);
		$(".submit").attr("disabled", false);
	}
});

$("#edit_form").on("submit", "#edit_form", function(e) {
	e.preventDefault();
	var data = $(this).serializeArray();

	$.ajax({
      url     : "/purcase/update",
      data    : data,
      type    : "post",
      dataType: "json",
      success: function(data) {
        if (data.msgtype=='success') {
          toastr["success"](data.message);
          $("#editModal").modal("hide");
          setTimeout(function(){location.reload();},900);
        } else {
          toastr["error"]("Something Went Wrong");
        }
      }
    });
});