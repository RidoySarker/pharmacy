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
        $medicine = Medicine::join('stocks','stocks.medicine_code','=','medicines.medicine_code')->where('medicines.medicine_code',$medicine)->where('stock_status', 'Active')->get();
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
        $_count_medicine = count($request->medicine_code);
        for ( $i = 0; $i< $_count_medicine; $i++ ) { 
            $stock = Stock::where('medicine_code', $request->medicine_code[$i])->where('stock_status', 'Active')
                ->limit($request->quantity[$i]);
            $stock->update(['stock_status' => 'Sold']);
            $whole_sale_medicine = new WholeSaleMedicine;
            $whole_sale_medicine->invoice_id = $request->invoice_id;
            $whole_sale_medicine->medicine_code = $request->medicine_code[$i];
            $whole_sale_medicine->quantity = $request->quantity[$i];
            $whole_sale_medicine->sub_total = $request->sub_total[$i];
            $whole_sale_medicine->save();
        }
        //exit();
        $response = [
            'msgtype' => 'success',
            'message' => 'Whole Sale Add Successfully',
        ];
        return response()->json($response , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WholeSale  $wholeSale
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $whole_sale_detail = WholeSaleDetail::where('invoice_id', $id)->first();
        $whole_sale_medicine = WholeSaleMedicine::where('invoice_id', $id)->get();
        return view('Admin.sale.whole_invoice', ['whole_sale_detail' => $whole_sale_detail, 'whole_sale_medicine' => $whole_sale_medicine]);
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
            'message' => 'Whole Sale Delete Successfully',
        ];
        echo json_encode($response);
    }
}
