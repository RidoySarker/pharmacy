<?php

namespace App\Http\Controllers;

use App\Desk;
use Illuminate\Http\Request;

class DeskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desk = Desk::orderBy('desk_id', 'desc')->get();
        return view('Admin.medicine.desk.desk', ['desk' => $desk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.medicine.desk.add_Modal');
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
            'desk_name'        => 'required',
            'desk_code'        => 'required',
            'desk_description' => 'required',
        ]);
        $data = [
            'desk_name'        => $request->desk_name,
            'desk_code'        => $request->desk_code,
            'desk_description' => $request->desk_description,
        ];
        Desk::create($data);
        $response = [
            'msgtype' => 'success',
            'message' => 'Desk Add Successfully',
        ];
        echo json_encode($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Desk  $desk
     * @return \Illuminate\Http\Response
     */
    public function show(Desk $desk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Desk  $desk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $desk = Desk::findOrFail($id);
        return view('Admin.medicine.desk.edit_Modal', ['desk' => $desk]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Desk  $desk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'desk_name'        => 'required',
            'desk_code'        => 'required',
            'desk_description' => 'required',
        ]);
        $data = [
            'desk_name'        => $request->desk_name,
            'desk_code'        => $request->desk_code,
            'desk_description' => $request->desk_description,
        ];
        $id = $request->desk_id;
        Desk::where('desk_id', $id)->update($data);
        $response = [
            'msgtype' => 'success',
            'message' => 'Desk Update Successfully',
        ];
        echo json_encode($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Desk  $desk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Desk::where('desk_id', $id)->delete();
        $response = [
            'msgtype' => 'success',
            'message' => 'Desk Delete Successfully',
        ];
        echo json_encode($response);
    }
}
