<?php

namespace App\Http\Controllers;

use App\Purcase;
use App\Stock;
use App\Medicine;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $c_date=date('Y-m-d');
        $expire_data['expire_data'] = Purcase::whereDate('expire_date', '<=', $c_date)->get();
        return view('Admin.stock.expire_date',$expire_data);
    }

    public function out_of_stock()
    {
       
        $stock_data['Purcase'] = Purcase::distinct()->get('medicine_code');
        $stock_data['Medicine'] = Medicine::get();
        $stock_data['stocks_data'] = Stock::get();
        return view('Admin.stock.out_of_stock',$stock_data);
    }


    public function stock_report()
    {
        return view('Admin.stock.stock_report');
    }

    public function stockTable(Request $request)
    {
      $data['perPage'] = $perPage =$request->input('perPage',10);
      $page = $request->input('page',1);
      $data['search'] = $search = $request->search;
      $data['sl'] =(($page-1)*$perPage)+1;
      $sortingClick =$request->sortingClick;
      $sorting = $request->sorting;
      $data['sortingClick'] = $sortingClick;
      $data['sorting'] = $sorting;
      $sortingfield=["medicine_name","company_name"];
      if($sorting>0)
      {
        $sorting=$sortingfield[$sorting-1];
      }
      else{
        $sorting= "medicine_id";
        $sortingClick = "desc";
      }
        $data['stock_data'] = Stock::get();
        $data['medicine_data'] = Medicine::when($search,function($query) use ($search){
        $query
        ->where('medicine_name','like',"%$search%")
            ->orWhere('company_name','like',"%{$search}%");
        })
        ->orderBy($sorting, $sortingClick)
        ->paginate($perPage);
        return view('Admin.stock.stockTable',$data);
    }

    public function medicine_data()
    {
        $medicine_data = Medicine::get();
        return view('Admin.stock.medicine_list',['medicine_list'=>$medicine_data]);
    }

    public function medicine_report($name)
    {
        $report_data = Purcase::where('medicine_code',$name)->get();
        $stock_report = Stock::where('medicine_code',$name)->where('stock_status' , 'Active')->get();
        return view('Admin.stock.medicine_report',['report_data'=>$report_data,'stock_report'=>$stock_report]);
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
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
