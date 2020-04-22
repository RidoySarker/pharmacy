<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use App\ExpenseFor;
use App\Medicine;
use App\RetailSale;
use App\Stock;
use App\WholeSaleDetail;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('Admin.index');
    }

    public function stock_data()
    {
        $customer = Stock::where('stock_status', 'Active')->count('batch_id');
        return response()->json($customer, 200);
    }

    public function customer_data()
    {
        $customer = Customer::where('customer_status', 'Active')->count();
        return response()->json($customer, 200);
    }

    public function company_data()
    {
        $company = Company::where('company_status', 'Active')->count();
        return response()->json($company, 200);
    }

    public function medicine_data()
    {
        $medicine = Medicine::where('medicine_status', 'Active')->count();
        return response()->json($medicine, 200);
    }

    public function expense_data()
    {
        $expense = ExpenseFor::sum('expense_cost');
        return response()->json($expense, 200);
    }

    public function expire_data()
    {
        $c_date = date('Y-m-d');
        $expire = Stock::where('expire_date', '<=', $c_date)->where('stock_status', 'Deactivated')->count();
        return response()->json($expire, 200);
    }

    public function outstock_data()
    {
        $expire = Stock::where('stock_status', 'Sold')->count();
        return response()->json($expire, 200);
    }

    public function invoice_data()
    {
        $whole_sale_invoice = WholeSaleDetail::count('invoice_id');
        $retail_sale_invoice = RetailSale::count('invoice_id');
        $total_invoice = ($whole_sale_invoice + $retail_sale_invoice);
        return response()->json($total_invoice, 200);
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
        //
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
