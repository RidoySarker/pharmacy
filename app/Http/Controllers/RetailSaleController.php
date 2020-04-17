<?php

namespace App\Http\Controllers;

use App\RetailSale;
use App\Medicine;
use App\Stock;
use App\RetailSaleChild;
use Illuminate\Http\Request;

class RetailSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicine = Medicine::where('medicine_status' , 'Active')->get();
        return view('Admin.sale.retail_sale',compact('medicine'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all_medicine($medicine)
    {
        $medicine = Medicine::join('stocks','stocks.medicine_code','=','medicines.medicine_code')->where('medicines.medicine_code',$medicine)->first();
        return response()->json($medicine, 200);
    }



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
        
        $request->validate([
            'customer_name'    => 'required'
         ]);

        $retail_sale = new RetailSale;
        $retail_sale->date = $request->date;
        $retail_sale->customer_name  = $request->customer_name;
        $retail_sale->invoice_id = $request->invoice_id;
        $retail_sale->grand_total = $request->grand_total;
        $retail_sale->payment = $request->payment;
        $retail_sale->save();

        for ($i=0; $i<count($request->medicine_code); $i++) { 
            $stock = Stock::where('medicine_code', $request->medicine_code[$i])->where('stock_status', 'Active')
                ->limit($request->quantity[$i]);
            $stock->update(['stock_status' => 'Deactivate']);
            $retail_sale_medicine = new RetailSaleChild;
            $retail_sale_medicine->invoice_id = $request->invoice_id;
            $retail_sale_medicine->medicine_code = $request->medicine_code[$i];
            $retail_sale_medicine->quantity = $request->quantity[$i];
            $retail_sale_medicine->sub_total = $request->sub_total[$i];
            $retail_sale_medicine->save();
        }
        $response = [
            'msgtype' => 'success',
            'message' => 'Retail Sale Successfully',
        ];
        return response()->json($response , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RetailSale  $retailSale
     * @return \Illuminate\Http\Response
     */
    public function retail_sale_report()
    {
        $retail_sale_report = RetailSale::orderBy('retail_sale_id','desc')->get();
        return view('Admin.sale.retail_sale_report',compact('retail_sale_report'));
    }

    public function show($id)
    {
      $invoice_data2=RetailSaleChild::where('invoice_id',$id)->get();
      $invoice_data1=RetailSale::where('invoice_id',$id)->first();
      return view('Admin.sale.retail_invoice',['invoice_data2'=>$invoice_data2,'invoice_data1'=>$invoice_data1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RetailSale  $retailSale
     * @return \Illuminate\Http\Response
     */
    public function edit(RetailSale $retailSale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RetailSale  $retailSale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RetailSale $retailSale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RetailSale  $retailSale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RetailSale::where('invoice_id', $id)->delete();
        RetailSaleChild::where('invoice_id', $id)->delete();
        $response = [
            'msgtype' => 'success',
            'message' => 'Retail Sale Deleted Successfully',
        ];
        echo json_encode($response);
    }
}
