<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.customer.customer');
    }

    public function customerData(Request $request)
    {
        $data['perPage'] = $perPage =$request->input('perPage',10);
        $page = $request->input('page',1);
        $data['search'] = $search = $request->search;
        $data['sl'] =(($page-1)*$perPage)+1;
        $sortingClick =$request->sortingClick;
        $sorting = $request->sorting;
        $data['sortingClick'] = $sortingClick;
        $data['sorting'] = $sorting;
        $sortingfield=["customer_name","customer_phone","customer_address","customer_status"];
        if($sorting>0)
        {
          $sorting=$sortingfield[$sorting-1];
        }
        else{
          $sorting= "customer_id";
          $sortingClick = "desc";
        }
        $data['customer'] = Customer::when($search,function($query) use ($search){
        $query
        ->where('customer_name','like',"%$search%")
            ->orWhere('customer_phone','like',"%{$search}%")
            ->orWhere('customer_address','like',"%{$search}%")
            ->orWhere('customer_status','like',"%{$search}%");
        })
        ->orderBy($sorting, $sortingClick)
        ->paginate($perPage);
        return view('Admin.customer.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.customer.add_Modal');
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
            'customer_name'    => 'required',
            'customer_phone'   => 'required|unique:customers',
            'customer_address'   => 'required',
            'customer_status' => 'required',
        ]);
        $data = [
            'customer_name'    => $request->customer_name,
            'customer_phone'   => $request->customer_phone,
            'customer_address'   => $request->customer_address,
            'customer_status' => $request->customer_status,
        ];
        Customer::create($data);
        $response = [
            'msgtype' => 'success',
            'message' => 'Customer Add Successfully',
        ];
        echo json_encode($response);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Customer['customer'] = Customer::find($id);
        return view('Admin.customer.edit_Modal',$Customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'customer_name'    => 'required',
            'customer_phone'   => 'required',
            'customer_address'   => 'required',
            'customer_status' => 'required',
        ]);
        $data = [
            'customer_name'    => $request->customer_name,
            'customer_phone'   => $request->customer_phone,
            'customer_address'   => $request->customer_address,
            'customer_status' => $request->customer_status,
        ];
        $id = $request->customer_id;
        Customer::where('customer_id', $id)->update($data);
        $response = [
            'msgtype' => 'success',
            'message' => 'Customer Update Successfully',
        ];
        echo json_encode($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::where('customer_id', $id)->delete();
        $response = [
            'msgtype' => 'success',
            'message' => 'Customer Delete Successfully',
        ];
        echo json_encode($response);
    }
}
