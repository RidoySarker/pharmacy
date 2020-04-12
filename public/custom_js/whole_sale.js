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
          url     : "/whole_sale/"+data,
          type    : "delete",
          dataType: "json",
          success: function(data) {
            if (data.msgtype=='success') {
              toastr["success"](data.message);
              window.setTimeout(function(){location.reload()},3000);
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