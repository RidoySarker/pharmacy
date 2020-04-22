<?php

namespace App\Http\Controllers;

use App\Medicine;
use App\Desk;
use App\Catagory;
use App\Company;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.medicine.medicine.medicine');
    }

    public function medicineTable(Request $request)
    { 
      $data['perPage'] = $perPage =$request->input('perPage',10);
      $page = $request->input('page',1);
      $data['search'] = $search = $request->search;
      $data['sl'] =(($page-1)*$perPage)+1;
      $sortingClick =$request->sortingClick;
      $sorting = $request->sorting;
      $data['sortingClick'] = $sortingClick;
      $data['sorting'] = $sorting;
      $sortingfield=["medicine_id","medicine_name","company_name","purcase_price","retail_price","whole_sell_price"];
      if($sorting>0)
      {
        $sorting=$sortingfield[$sorting-1];
      }
      else{
        $sorting= "medicine_id";
        $sortingClick = "desc";
      }
        $data['medicine'] = Medicine::when($search,function($query) use ($search){
        $query
        ->where('medicine_code','like',"%$search%")
            ->orWhere('medicine_name','like',"%{$search}%")
            ->orWhere('catagory','like',"%{$search}%")
            ->orWhere('company_name','like',"%{$search}%")
            ->orWhere('desk_name','like',"%{$search}%")
            ->orWhere('purcase_price','like',"%{$search}%")
            ->orWhere('retail_price','like',"%{$search}%")
            ->orWhere('whole_sell_price','like',"%{$search}%");
        })
        ->orderBy($sorting, $sortingClick)
        ->paginate($perPage);
        return view('Admin.medicine.medicine.medicineTable',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $desk = Desk::get();
        $catagory = Catagory::where('catagory_status', 'Active')->get();
        $company = Company::where('company_status', 'Active')->get();
        return view('Admin.medicine.medicine.add_Modal', ['desk' => $desk, 'catagory' => $catagory, 'company' => $company]);
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
            'medicine_code'        => 'required',
            'medicine_name'        => 'required',
            'catagory'             => 'required',
            'company_name'         => 'required',
            'desk_name'            => 'required',
            'purcase_price'        => 'required',
            'retail_price'         => 'required',
            'whole_sell_price'     => 'required',
            'medicine_description' => 'required',
            'medicine_status'      => 'required',
        ]);
        $data = [
            'medicine_code'        => $request->medicine_code,
            'medicine_name'        => $request->medicine_name,
            'catagory'             => $request->catagory,
            'company_name'         => $request->company_name,
            'desk_name'            => $request->desk_name,
            'purcase_price'        => $request->purcase_price,
            'retail_price'         => $request->retail_price,
            'whole_sell_price'     => $request->whole_sell_price,
            'medicine_description' => $request->medicine_description,
            'medicine_status'      => $request->medicine_status,
        ];
        Medicine::create($data);
        $response = [
            'msgtype' => 'success',
            'message' => 'Medicine Add Successfully',
        ];
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medicine = Medicine::findOrFail($id);
        $desk = Desk::get();
        $catagory = Catagory::where('catagory_status', 'Active')->get();
        $company = Company::where('company_status', 'Active')->get();
        return view('Admin.medicine.medicine.show_Modal', ['medicine' => $medicine, 'desk' => $desk, 'catagory' => $catagory, 'company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        $desk = Desk::get();
        $catagory = Catagory::where('catagory_status', 'Active')->get();
        $company = Company::where('company_status', 'Active')->get();
        return view('Admin.medicine.medicine.edit_Modal', ['medicine' => $medicine, 'desk' => $desk, 'catagory' => $catagory, 'company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'medicine_code'        => 'required',
            'medicine_name'        => 'required',
            'catagory'             => 'required',
            'company_name'         => 'required',
            'desk_name'            => 'required',
            'purcase_price'        => 'required',
            'retail_price'         => 'required',
            'whole_sell_price'     => 'required',
            'medicine_description' => 'required',
            'medicine_status'      => 'required',
        ]);
        $data = [
            'medicine_code'        => $request->medicine_code,
            'medicine_name'        => $request->medicine_name,
            'catagory'             => $request->catagory,
            'company_name'         => $request->company_name,
            'desk_name'            => $request->desk_name,
            'purcase_price'        => $request->purcase_price,
            'retail_price'         => $request->retail_price,
            'whole_sell_price'     => $request->whole_sell_price,
            'medicine_description' => $request->medicine_description,
            'medicine_status'      => $request->medicine_status,
        ];
        $id = $request->medicine_id;
        Medicine::where('medicine_id', $id)->update($data);
        $response = [
            'msgtype' => 'success',
            'message' => 'Medicine Update Successfully',
        ];
        echo json_encode($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medicine::where('medicine_id', $id)->delete();
        $response = [
            'msgtype' => 'success',
            'message' => 'Medicine Delete Successfully',
        ];
        echo json_encode($response);
    }
}
