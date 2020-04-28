<?php

namespace App\Http\Controllers;

use App\Purcase;
use App\Company;
use App\Medicine;
use App\Stock;
use Illuminate\Http\Request;
use Validator;
use DB;

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

    public function medicine_list($medicine_code)
    {
        $medicine = Medicine::where('medicine_code', $medicine_code)->get();
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
        $purcaseModel = new Purcase;
        $validate = Validator::make($request->all(),$purcaseModel->validation());
        if($validate->fails())
        {
            return response()->json(['error'=>$validate->errors()->all()]);
        }
        $PurcaseCount=count($request->medicine_code);
        for ($i=0; $i <$PurcaseCount ; $i++) { 
            
            $insert[]=[
                'date'          => $request->date,
                'batch_id'      => $request->batch_id,
                'expire_date'   => $request->expire_date[$i],
                'company_name'  => $request->company_name[$i],
                'medicine_code' => $request->medicine_code[$i],
                'quantity'      => $request->quantity[$i],
                'sub_total'     => $request->sub_total[$i],
                'grand_total'   => $request->grand_total,
                'pay'           => $request->pay,
            ];
            for ($a=0; $a<($request->quantity[$i]); $a++) { 
                $stock[] =[
                    'batch_id' => $request->batch_id,
                    'medicine_code' => $request->medicine_code[$i],
                    'expire_date' => $request->expire_date[$i],
                    'stock_status' => $request->stock_status
                ];
            }
        }
        Stock::insert($stock);
        Purcase::insert($insert);
        $response = [
            'msgtype' => 'success',
            'message' => 'Purcase Successfully',
        ];
        return response()->json($response , 200);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purcase  $purcase
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
     * @param  \App\Purcase  $purcase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
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
            'message' => 'Purcase Delete Successfully',
        ];
        echo json_encode($response);
    }

    public function expire_date()
    {
        
    }

}
