$(document).ready(function() {
  //Insert Modal
  $("#add").click(function() {
    $.ajax({
        url     : "desk/create",
        type    : "get",
        dataType: "html",
        success: function(data) {
            $("#add_form").html(data);
        }
    });
    $("#addModal").modal();
  });
  //Insert
  $(document).on("submit", "#modal_form", function(e) {
    e.preventDefault();
    var data = $(this).serializeArray();

    $.ajax({
      url     : "desk/store",
      data    : data,
      type    : "post",
      dataType: "json",
      success: function(data) {
        if (data.msgtype=='success') {
          toastr["success"](data.message);
          $("#addModal").modal("hide");
          setTimeout(function(){location.reload();},900);
        } else {
          toastr["error"]("Something Went Wrong");
        }
      }, error:function(errors) {
          var text=errors.responseText;
          var error=JSON.parse(text);
          $("#modal_form").find(".alert-danger").remove();
          $("#modal_form").find(".modal-body").prepend("<div class='alert alert-danger'>"+error.message+"</div>");
          $("#modal_form").find('.form-group').each(function(){
            var $that =$(this);
            $(this).find('.help-block').remove();
            var inputName=$(this).find('[name]').first().attr('name');
            if(error.errors[inputName])
            {
              $.each(error.errors[inputName],function(i,message){
                $that.append('<span class="help-block" style="color:red;">'+message+'</span>');
              })
            }
          });

      }      
    });
  });
  //Edit_Modal
  $(document).on("click", ".edit", function() {
    var data = $(this).attr("data");

    $.ajax({
        url     : "desk/"+data+"/edit",
        type    : "get",
        dataType: "html",
        success: function(data) {
            $("#edit_form").html(data);
        }
    });
    $("#editModal").modal();
  });
  //Edit
  $(document).on("submit", "#edit_form", function(e) {
    e.preventDefault();
    var data = $(this).serializeArray();

    $.ajax({
      url     : "desk/update",
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
      }, error:function(errors) {
          var text=errors.responseText;
          var error=JSON.parse(text);
          $("#edit_form").find(".alert-danger").remove();
          $("#edit_form").find(".modal-body").prepend("<div class='alert alert-danger'>"+error.message+"</div>");
      } 
    });
  });
  //Delete
  $(document).on("click", ".delete", function() {
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
          url     : "desk/"+data,
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

});
