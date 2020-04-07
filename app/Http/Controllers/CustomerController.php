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
        $Customer['customer'] = Customer::orderBy('customer_id','desc')->get();
        return view('Admin.customer.customer',$Customer);
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
            'message' => 'Data Deleted Successfully',
        ];
        echo json_encode($response);
    }
}
