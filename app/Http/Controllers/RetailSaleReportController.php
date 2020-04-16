<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RetailSale;
use App\Medicine;
use App\RetailSaleChild;
class RetailSaleReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.report.retailsale_report');
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
        $retail_sale_report = RetailSale::join('retail_sale_medicines','retail_sale_medicines.invoice_id', '=', 'retail_sales.invoice_id')->whereBetween('date', [$date1,$date2])->get();


            $table="<table id=\"example1\" class=\"table table-bordered table-striped\">";
            $table.="<thead>";
            $table.="<tr>";
            $table.="<th>Medicine Name</th>";
            $table.="<th>Catagory</th>";
            $table.="<th>Company Name</th>";
            $table.="<th>Sale</th>";
            $table.="<th>Purcase Bill</th>";
            $table.="<th>Retail Bill</th>";
            $table.="<th>Profit</th>";
            $table.="</tr>";
            $table.="</thead>";
            $table.="<tbody>";
            foreach($medicine as $medicineData)
            {
                $table.="<tr>";
                $table.="<td>$medicineData->medicine_name</td>";
                $table.="<td>$medicineData->catagory</td>";
                $table.="<td>$medicineData->company_name</td>";
                $sale = $retail_sale_report->where('medicine_code',$medicineData->medicine_code)->sum('quantity');
                $purcase_bill = $medicineData->purcase_price*$sale;
                $retail_sale_bill= $medicineData->retail_price*$sale;
                $profit = $retail_sale_bill-$purcase_bill;
                $table.="<td>$sale</td>";
                $table.="<td>$purcase_bill</td>";
                $table.="<td>$retail_sale_bill</td>";
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
