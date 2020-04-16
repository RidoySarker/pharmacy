<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::orderBy('company_id', 'desc')->get();
        return view('Admin.medicine.company.company', ['company' => $company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.medicine.company.add_Modal');
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
            'company_name'    => 'required',
            'company_phone'   => 'required',
            'company_email'   => 'required',
            'company_address' => 'required',
            'company_status'  => 'required',
        ]);
        $data = [
            'company_name'    => $request->company_name,
            'company_phone'   => $request->company_phone,
            'company_email'   => $request->company_email,
            'company_address' => $request->company_address,
            'company_status'  => $request->company_status,
        ];
        Company::create($data);
        $response = [
            'msgtype' => 'success',
            'message' => 'Company Add Successfully',
        ];
        echo json_encode($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('Admin.medicine.company.edit_Modal', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'company_name'    => 'required',
            'company_phone'   => 'required',
            'company_email'   => 'required',
            'company_address' => 'required',
            'company_status'  => 'required',
        ]);
        $data = [
            'company_name'    => $request->company_name,
            'company_phone'   => $request->company_phone,
            'company_email'   => $request->company_email,
            'company_address' => $request->company_address,
            'company_status'  => $request->company_status,
        ];
        $id = $request->company_id;
        Company::where('company_id', $id)->update($data);
        $response = [
            'msgtype' => 'success',
            'message' => 'Company Update Successfully',
        ];
        echo json_encode($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::where('company_id', $id)->delete();
        $response = [
            'msgtype' => 'success',
            'message' => 'Company Delete Successfully',
        ];
        echo json_encode($response);
    }
}
