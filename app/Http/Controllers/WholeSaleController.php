<?php

namespace App\Http\Controllers;

use App\WholeSaleDetail;
use App\WholeSaleMedicine;
use App\Medicine;
use App\Customer;
use App\Stock;

use Illuminate\Http\Request;

class WholeSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicine = Medicine::where('medicine_status', 'Active')->get();
        $customer = Customer::get();
        return view('Admin.sale.whole_sale', ['medicine' => $medicine, 'customer' => $customer]);
    }

    public function medicine_all($medicine)
    {
        $medicine = Medicine::join('stocks','stocks.medicine_code','=','medicines.medicine_code')->where('medicines.medicine_code',$medicine)->first();
        return response()->json($medicine, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $whole_sale_list = WholeSaleDetail::orderBy('whole_sale_detail_id', 'desc')->get();
        return view('Admin.sale.whole_sale_report', ['whole_sale_list' => $whole_sale_list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $whole_sale_detail = new WholeSaleDetail;
        $whole_sale_detail->date = $request->date;
        $whole_sale_detail->customer_name = $request->customer_name;
        $whole_sale_detail->invoice_id = $request->invoice_id;
        $whole_sale_detail->grand_total = $request->grand_total;
        $whole_sale_detail->payment = $request->payment;
        $whole_sale_detail->save();

        for ($i=0; $i<count($request->medicine_code); $i++) { 
            $stock = Stock::where('medicine_code', $request->medicine_code[$i])->first();
            $stock_qty = $stock->total_stock-$request->quantity[$i];
            $stock->update(['total_stock' => $stock_qty]);
            $whole_sale_medicine = new WholeSaleMedicine;
            $whole_sale_medicine->invoice_id = $request->invoice_id;
            $whole_sale_medicine->medicine_code = $request->medicine_code[$i];
            $whole_sale_medicine->quantity = $request->quantity[$i];
            $whole_sale_medicine->sub_total = $request->sub_total[$i];
            $whole_sale_medicine->save();
        }
        $response = [
            'msgtype' => 'success',
            'message' => 'Data Inserted Successfully',
        ];
        echo json_encode($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WholeSale  $wholeSale
     * @return \Illuminate\Http\Response
     */
    public function show(WholeSale $wholeSale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WholeSale  $wholeSale
     * @return \Illuminate\Http\Response
     */
    public function edit(WholeSale $wholeSale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WholeSale  $wholeSale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WholeSale $wholeSale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WholeSale  $wholeSale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WholeSaleDetail::where('invoice_id', $id)->delete();
        WholeSaleMedicine::where('invoice_id', $id)->delete();
        $response = [
            'msgtype' => 'success',
            'message' => 'Data Deleted Successfully',
        ];
        echo json_encode($response);
    }
}
