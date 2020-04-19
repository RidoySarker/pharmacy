@extends('layouts.app') 
@section('title') Team #Hash Pharmacy Dashboard @endsection 
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 id="stockdata"></h3>

                        <p>Total Stock</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas fa-handshake"></i>
                    </div>
                    <a href="/stock_report" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3 id="company"></h3>
                        <p>Total Company</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <a href="{{url('company')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 id="customer"></h3>

                        <p>Total Customer</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{url('customer')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 id="medicine"></h3>

                        <p>Total Medicine</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-capsules"></i>
                    </div>
                    <a href="{{url('medicine')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3></h3>

                        <p>Out Of Stock</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tablets"></i>
                    </div>
                    <a href="{{url('out_of_stock')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 id="expire"></h3>

                        <p>Expired</p> 
                    </div>
                    <div class="icon">
                        <i class="fas fa-skull-crossbones"></i>
                    </div>
                    <a href="{{url('expire_date')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3 id="invoicedata"></h3>

                        <p>Total Invoice</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-file-pdf"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 id="expense"></h3>

                        <p>Total Expense</p>
                    </div>
                    <div class="icon">
                       <i class="fas fa-money-bill-alt"></i>
                    </div>
                    <a href="{{url('expense_for')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        getStock();
        getCustomer();
        getCompany();
        getMedicine();
        getExpense();
        getExpire();
        getInvoice();

        function getStock() {
            
            $.ajax({
                url: "/stock_data",
                type: "get",
                cache: false,
                datatype: "html",
                success: function(data) {
                    $("#stockdata").html(data);
                }
            });

        }

        function getCustomer() {
            
            $.ajax({
                url: "/customer_data",
                type: "get",
                cache: false,
                datatype: "html",
                success: function(data) {
                    $("#customer").html(data);
                }
            });

        }

        function getCompany() {
            
            $.ajax({
                url: "/company_data",
                type: "get",
                cache: false,
                datatype: "html",
                success: function(data) {
                    $("#company").html(data);
                }
            });

        }

        function getMedicine() {
            
            $.ajax({
                url: "/medicine_data",
                type: "get",
                cache: false,
                datatype: "html",
                success: function(data) {
                    $("#medicine").html(data);
                }
            });

        }

        function getExpire() {
            
            $.ajax({
                url: "/expire_data",
                type: "get",
                cache: false,
                dataType: "html",
                success: function(data) {
                    $("#expire").html(data);
                }
            });

        }

        function getInvoice() {
            
            $.ajax({
                url: "/invoice_data",
                type: "get",
                cache: false,
                datatype: "html",
                success: function(data) {
                    $("#invoicedata").html(data);
                }
            });

        }

        function getExpense() {
            
            $.ajax({
                url: "/expense_data",
                type: "get",
                cache: false,
                datatype: "html",
                success: function(data) {
                    $("#expense").html(data);
                }
            });

        }
        setInterval(getCustomer, 100000);
        setInterval(getCompany, 100000);
        setInterval(getMedicine, 100000);
        setInterval(getMedicine, 100000);
        setInterval(getInvoice, 100000);
        setInterval(getExpense, 100000);
        setInterval(getExpire, 100000);
    });
</script>
@endsection