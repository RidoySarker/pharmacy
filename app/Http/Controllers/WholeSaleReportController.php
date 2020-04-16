<?php

namespace App\Http\Controllers;

use App\WholeSaleDetail;
use App\WholeSaleMedicine;
use App\Medicine;
use Illuminate\Http\Request;

class WholeSaleReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.report.whole_sale_report');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date1 = $request->date1;
        $date2 = $request->date2;
        $medicine = Medicine::get();
        $whole_sale_report = WholeSaleDetail::join('whole_sale_medicines' , 'whole_sale_medicines.invoice_id', '=', 'whole_sale_details.invoice_id')->whereBetween('date', [$date1, $date2])->get();
        
        $table="<table id=\"example1\" class=\"table table-bordered table-striped\">";
        $table.="<thead>";
        $table.="<tr>";
        $table.="<th>Medicine Name</th>";
        $table.="<th>Catagory</th>";
        $table.="<th>Company Name</th>";
        $table.="<th>Quantity</th>";
        $table.="<th>Purcase Bill</th>";
        $table.="<th>Whole sale Bill</th>";
        $table.="<th>Profit</th>";
        $table.="</tr>";
        $table.="</thead>";
        $table.="<tbody>";
        foreach ($medicine as $value) 
        {
            $table.="<tr>";
            $table.="<td>$value->medicine_name</td>";
            $table.="<td>$value->catagory</td>";
            $table.="<td>$value->company_name</td>";
            $quantity = $whole_sale_report->where('medicine_code', $value->medicine_code)->sum('quantity');
            $purcase_bill = $value->purcase_price*$quantity;
            $whole_sale_bill = $value->whole_sell_price*$quantity;
            $profit = $whole_sale_bill-$purcase_bill;
            $table.="<td>$quantity</td>";
            $table.="<td>$purcase_bill</td>";
            $table.="<td>$whole_sale_bill</td>";
            $table.="<td>$profit</td>";
            $table.="</tr>";
        }
        $table.="</tbody>";
        $table.="</table>";

        echo $table;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
