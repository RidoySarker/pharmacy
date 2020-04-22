<?php

namespace App\Http\Controllers;

use App\Catagory;
use Illuminate\Http\Request;
use Toastr;
use Validator;

class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.medicine.category.category');
    }

    public function catagoryData(Request $request)
    {
        $data['perPage'] = $perPage =$request->input('perPage',10);
        $page = $request->input('page',1);
        $data['search'] = $search = $request->search;
        $data['sl'] =(($page-1)*$perPage)+1;
        $sortingClick =$request->sortingClick;
        $sorting = $request->sorting;
        $data['sortingClick'] = $sortingClick;
        $data['sorting'] = $sorting;
        $sortingfield=["catagory_name","catagory_description","catagory_status"];
        if($sorting>0)
        {
          $sorting=$sortingfield[$sorting-1];
        }
        else{
          $sorting= "catagory_id";
          $sortingClick = "desc";
        }
        $data['category'] = Catagory::when($search,function($query) use ($search){
        $query
        ->where('catagory_name','like',"%$search%")
            ->orWhere('catagory_description','like',"%{$search}%")
            ->orWhere('catagory_status','like',"%{$search}%");
        })
        ->orderBy($sorting, $sortingClick)
        ->paginate($perPage);
        return view('Admin.medicine.category.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.medicine.category.add_Modal');
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
            'catagory_name'        => 'required',
            'catagory_description' => 'required',
            'catagory_status'      => 'required',
        ]);
        $data = [
            'catagory_name'        => $request->catagory_name,
            'catagory_description' => $request->catagory_description,
            'catagory_status'      => $request->catagory_status,
        ];
        Catagory::create($data);
        $response = [
            'msgtype' => 'success',
            'message' => 'Category Add Successfully',
        ];
        echo json_encode($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function show(Catagory $catagory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catagory = Catagory::findOrFail($id);
        return view('Admin.medicine.category.edit_Modal', ['catagory' => $catagory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'catagory_name'        => 'required',
            'catagory_description' => 'required',
            'catagory_status'      => 'required',
        ]);
        $data = [
            'catagory_name'        => $request->catagory_name,
            'catagory_description' => $request->catagory_description,
            'catagory_status'      => $request->catagory_status,
        ];
        $id = $request->catagory_id;
        Catagory::where('catagory_id', $id)->update($data);
        $response = [
            'msgtype' => 'success',
            'message' => 'Category Update Successfully',
        ];
        echo json_encode($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Catagory::where('catagory_id', $id)->delete();
        $response = [
            'msgtype' => 'success',
            'message' => 'Category Delete Successfully',
        ];
        echo json_encode($response);
    }
}
