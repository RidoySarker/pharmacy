@extends('layouts.app') @section('title', 'Retail Sale Report') @section('content')
<!DOCTYPE html>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Retail Sale Report</h1>
            </div>
        </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Retail Sale Report List</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Invoice Id</th>
                                <th>Customer Name</th>
                                <th>Grand Total</th>
                                <th>Payment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($retail_sale_report as $key => $value)
                            <tr>
                                <td>{{ $value->date }}</td>
                                <td>{{ $value->invoice_id }}</td>
                                <td>{{ $value->customer_name }}</td>
                                <td>{{ $value->grand_total }}</td>
                                <td>{{ $value->payment }}</td>
                                <td>
                                    <button class="edit btn btn-outline-primary btn-xs" data-toggle="modal" data-target=".bd-example-modal-lg" data="{{ $value->invoice_id }}"><i class="fa fa-eye"></i></button>
                                    <button class="delete btn btn-outline-danger btn-xs" data="{{ $value->invoice_id }}"><i class="fa fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Invoice Id</th>
                                <th>Customer Name</th>
                                <th>Grand Total</th>
                                <th>Payment</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="invoice">

                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header>
                            <div class="row">
                                <div class="col">
                                    <img src="{{asset('images/logo.jpg')}}" class="image" />
                                </div>
                                <div class="col company-details">
                                    <h2 class="name">
                            Team #Hash
                        </h2>
                                    <div>TMSS Road, Kazipara, Mirpur 10</div>
                                    <div>(088) 236 456-789</div>
                                    <div>admin@example.com</div>
                                </div>
                            </div>
                        </header>
                        <div id="invoicedata"></div>

                        <footer>
                            Developed by :Team #Hash
                        </footer>
                    </div>

                    <div></div>
                    <div class="toolbar hidden-print">
                        <div class="text-right">
                            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
                            <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@stop @section('script')
<script type="text/javascript">
    $(document).ready(function() {

        $('#printInvoice').click(function() {
            Popup($('.invoice')[0].outerHTML);

            function Popup(data) {
                window.print();
                return true;
            }
        });

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
                            url: "/retail_sale/" + data,
                            type: "delete",
                            dataType: "json",
                            success: function(data) {
                                if (data.msgtype == 'success') {
                                    toastr["success"](data.message);
                                    window.setTimeout(function() {
                                        location.reload()
                                    }, 1500);
                                } else {
                                    toastr["error"]("Something Went Wrong");
                                }
                            }
                        });
                    }
                });
        });

        //invoice

        $(document).on("click", ".edit", function() {
            var data = $(this).attr("data");
            $.ajax({
                url: "/retail_sale/show/" + data,
                taype: "get",
                dataType: "html",
                success: function(data) {
                    $("#invoicedata").html(data);
                }
            });
        });

    });
</script>
@endsection