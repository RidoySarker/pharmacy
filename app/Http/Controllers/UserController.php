<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use File;
use Toastr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.profile.profile');
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
         $request->validate([
            'name'   => 'required',
            'gender' => 'required',
            'contact'=> 'required'
        ]);
        if($request->hasFile('image')) {
            if($request->old_img!=''){
                unlink($request->old_img);
            }
            $image_type = $request->file('image')->getClientOriginalExtension();
            $path = "images/profile";
            $name = 'user_'.time().".".$image_type;
            $image = $request->file('image')->move($path,$name);
            
            $data = [
                'name'   => $request->name,
                'gender' => $request->gender,
                'contact'=> $request->contact,
                'image'  => $image
            ];
        } else {
            $data = [
                'name'   => $request->name,
                'gender' => $request->gender,
                'contact'=> $request->contact
            ];
        }
        
        User::where('id', Auth::user()->id)->update($data);
        Toastr::success('Profile Update Successfully', 'Success');
        return back();
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
