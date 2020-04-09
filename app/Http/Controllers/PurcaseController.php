<?php

namespace App\Http\Controllers;

use App\Purcase;
use App\Company;
use App\Medicine;
use Illuminate\Http\Request;

class PurcaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::where('company_status', 'Active')->get();
        return view('Admin.purcase.purcase', ['company' => $company]);
    }

    public function medicine_name($company)
    {
        $medicine = Medicine::where('company_name', $company)->get();
        return response()->json($medicine, 200);
    }

    public function medicine_list($medicine)
    {
        $medicine = Medicine::where('medicine_code', $medicine)->get();
        return response()->json($medicine, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $purcase = Purcase::join('medicines', 'medicines.medicine_code', '=', 'purcases.medicine_code')->get();
        return view('Admin.purcase.purcase_report', ['purcase' => $purcase]);
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
            'date'          => 'required',
            'company_name'  => 'required',
            'medicine_code' => 'required',
            'quantity'      => 'required',
            'sub_total'     => 'required',
            'grand_total'   => 'required',
            'pay'           => 'required',
            'rest'          => 'required',
        ]);
        $data = [
            'date'          => $request->date,
            'company_name'  => $request->company_name,
            'medicine_code' => $request->medicine_code,
            'quantity'      => $request->quantity,
            'sub_total'     => $request->sub_total,
            'grand_total'   => $request->grand_total,
            'pay'           => $request->pay,
            'rest'          => $request->rest,
        ];
        Purcase::create($data);
        $response = [
            'msgtype' => 'success',
            'message' => 'Data Inserted Successfully',
        ];
        echo json_encode($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purcase  $purcase
     * @return \Illuminate\Http\Response
     */
    public function show(Purcase $purcase)
    {
        //
    }

    public function rest_report()
    {
        $purcase = Purcase::join('medicines', 'medicines.medicine_code', '=', 'purcases.medicine_code')->where('rest','>',0)->get();
        return view('Admin.purcase.rest_report', ['purcase' => $purcase]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purcase  $purcase
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purcase = Purcase::findOrFail($id);
        return view('Admin.purcase.edit_Modal', ['purcase' => $purcase]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purcase  $purcase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $purcase_data = Purcase::where('purcase_id', $request->purcase_id)->first();
        $total_pay = $request->now_pay+$request->pay;
        $purcase_data->update(['pay' => $total_pay, 'rest' => $request->rest]);
        $response = [
            'msgtype' => 'success',
            'message' => 'Data Updated Successfully',
        ];
        echo json_encode($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purcase  $purcase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Purcase::where('purcase_id', $id)->delete();
        $response = [
            'msgtype' => 'success',
            'message' => 'Data Deleted Successfully',
        ];
        echo json_encode($response);
    }
}
