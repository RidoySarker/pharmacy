@extends('layouts.app')
@section('title', 'Category')
@section('content')
<!DOCTYPE html>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Category</h1>
      </div>
      <div class="col-sm-6">
        <button type="button" style="margin-left: 445px;" class="btn btn-info btn-sm" id="add">Add New</button>
      </div>
    </div>
</section>

  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Category List</h3>
          </div>
          <div class="row">
            <div class="col-sm-6">
                <label style="margin-left: 20px;">Show <select name="example1_length" aria-controls="example1" class="form-control input-sm" id="perPage">
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select> </label>
            </div>
            <div class="col-sm-6">
              <div style="margin-left: 293px;">
                <label>Search:<input name="search" id="search" class="form-control input-sm" placeholder="" aria-controls="example1">
                </label>
              </div>
            </div>
          </div>
          <div class="card-body">

            <div id="DataList"></div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <div id="add_form"></div>

    </div>
  </div>
</div>

<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <div id="edit_form"></div>

    </div>
  </div>
</div>
@stop
@section('script')
<script type="text/javascript">
  $(document).ready(function() {
  //Insert Modal
  $("#add").click(function() {
    $.ajax({
        url     : "catagory/create",
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
      url     : "catagory/store",
      data    : data,
      type    : "post",
      dataType: "json",
      success: function(data) {
        $("#addModal").modal("hide");
        toastr["success"]("Category Added Succesfully");
        loadTableData();
      }, error:function(errors) {
           let error = JSON.parse(errors.responseText).errors;
           $.each(error,function(i,message){
                $("#"+i+"_error").html('<span class="help-block" style="color:red;">'+message+'</span>');
           })
      }
    });

    // $.ajax({
    //   url     : "catagory/store",
    //   data    : data,
    //   type    : "post",
    //   dataType: "json",
    //   success: function(data) {
    //     if (data.msgtype=='success') {
    //       toastr["success"](data.message);
    //       $("#addModal").modal("hide");
    //       loadTableData();
    //     } else {
    //       toastr["error"]("Something Went Wrong");
    //     }
    //   }, error:function(errors) {
    //       var text=errors.responseText;
    //       var error=JSON.parse(text);
    //       $("#modal_form").find(".alert-danger").remove();
    //       $("#modal_form").find(".modal-body").prepend("<div class='alert alert-danger'>"+error.message+"</div>");
    //       $("#modal_form").find('.form-group').each(function(){
    //         var $that =$(this);
    //         $(this).find('.help-block').remove();
    //         var inputName=$(this).find('[name]').first().attr('name');
    //         if(error.errors[inputName])
    //         {
    //           $.each(error.errors[inputName],function(i,message){
    //             $that.append('<span class="help-block" style="color:red;">'+message+'</span>');
    //           })
    //         }
    //       });

    //   }
    // });

  });
  //Edit_Modal
  $(document).on("click", ".edit", function() {
    var data = $(this).attr("data");

    $.ajax({
        url     : "catagory/"+data+"/edit",
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
      url     : "catagory/update",
      data    : data,
      type    : "post",
      dataType: "json",
      success: function(data) {
        if (data.msgtype=='success') {
          toastr["success"](data.message);
          $("#editModal").modal("hide");
          loadTableData();
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
          url     : "catagory/"+data,
          type    : "delete",
          dataType: "json",
          success: function(data) {
            if (data.msgtype=='success') {
              toastr["success"](data.message);
              loadTableData();
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
  loadTableData();
    $("#perPage").change(function(){
      loadTableData();
    })
    $("#search").keyup(function(){
      loadTableData();
    });
    $("#DataList").on("click",".page-link",function(e){
      e.preventDefault();
      var pagelink = $(this).attr("href");
      loadTableData(pagelink);
    });
    $("#DataList").on("click", ".sorting", function(){
        var sortingClass = $(this).hasClass("sorting_asc") ? 'sorting_desc' : 'sorting_asc';
        $("#DataList").find(".sorting").removeClass("sorting_asc").removeClass("sorting_desc");
        $(this).addClass(sortingClass);
      loadTableData();
    });
});
function loadTableData(pagelink="{{url('catagoryData')}}"){
    var perPage = $("#perPage").val();
    var search = $("#search").val();
    if($("#DataList").find(".sorting").hasClass("sorting_asc")){
      var sortingClick = 'asc';
      var sorting = $("#DataList").find(".sorting_asc").attr("sorting");
    }
    else if($("#DataList").find(".sorting").hasClass("sorting_desc")){
      var sortingClick = 'desc';
      var sorting = $("#DataList").find(".sorting_desc").attr("sorting");
    }
    else {
      var sortingClick = '';
      var sorting = '';
    }
    $.ajax({
      url:pagelink ,
      data:{perPage : perPage, search : search, sortingClick: sortingClick, sorting : sorting },
      type: "get",
      dataTpe: "html",
      success:function(data)
      {
        $("#DataList").html(data);
      }
    });
  }
</script>
@endsection
