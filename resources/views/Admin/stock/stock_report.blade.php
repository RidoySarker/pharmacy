@extends('layouts.app')
@section('title', 'Stock Report | Pharmacy')
@section('content')
<!DOCTYPE html>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Stock Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="btn btn-info" href="/purcase">Purcase</a></li>  &nbsp;
              <li class=""><a class="btn btn-info" href="/medicine_report">Medicne Wise Stock</a> </li>
            </ol>
          </div>


        </div>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Stock Report</h3>
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
@stop
@section('script')
<script type="text/javascript">
  
$(document).ready(function(){

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

//TableData
  function loadTableData(pagelink="{{url('stockTable')}}"){
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
