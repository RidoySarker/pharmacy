@extends('layouts.app') @section('title') Team #Hash Pharmacy Dashboard @endsection @section('content')
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
                        <h3>
                  @php
                  $stock_data = DB::table('stocks')->get();
                  @endphp
                  {{collect($stock_data)->sum('total_stock')}}
                </h3>

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
                        <h3>
                          @php
                           $company=DB::table('companies')->get();
                          @endphp
                          {{collect($company)->count('company_id')}}
                        </h3>
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
                        <h3>
                          @php
                           $company=DB::table('customers')->get();
                          @endphp
                          {{collect($company)->count('customer_id')}}
                        </h3>

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
                        <h3>
                          @php
                           $medicines=DB::table('medicines')->get();
                          @endphp
                          {{collect($medicines)->count('medicine_id')}}
                        </h3>

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
                        <h3>
                        @php
                        $out_stocks=DB::table('stocks')->where('total_stock','=',0)->get();
                        @endphp
                        {{collect($out_stocks)->count('medicine_code')}}

                        </h3>

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
                        <h3>
                            @php
                            $c_date=date('Y-m-d');
                            $ex_date = DB::table('purcases')->whereDate('expire_date', '<=', $c_date)->get();
                            @endphp
                            {{collect($ex_date)->count('expire_date')}}
                        </h3>

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
                        <h3>
                          @php
                           $retail_invoice=DB::table('retail_sale_medicines')->get();
                           $whole_invoice=DB::table('whole_sale_medicines')->get();
                          $r_invoice=collect($retail_invoice)->count('invoice_id');
                          $w_invoice=collect($whole_invoice)->count('invoice_id');
                          $total_invoice=$r_invoice+$w_invoice;
                          @endphp
                          {{$total_invoice}}
                        </h3>
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
                        <h3>
                  @php
                  $expenses = DB::table('expense_fors')->get();
                  @endphp
                  {{collect($expenses)->sum('expense_cost')}}
                        </h3>

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