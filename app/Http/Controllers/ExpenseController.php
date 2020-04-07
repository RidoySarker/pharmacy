<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Expense['expense'] = Expense::orderBy('expense_catagory_id','desc')->get();
        return view('Admin.expense.expense_category.expense_category',$Expense);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.expense.expense_category.add_Modal');
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
            'expense_name'    => 'required',
            'expense_description'   => 'required',
            'expense_status' => 'required',
        ]);
        $data = [
            'expense_name'    => $request->expense_name,
            'expense_description'   => $request->expense_description,
            'expense_status'   => $request->expense_status,
        ];
        Expense::create($data);
        $response = [
            'msgtype' => 'success',
            'message' => 'Expense Catagory Add Successfully',
        ];
        echo json_encode($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Expense['expense'] = Expense::find($id);
        return view('Admin.expense.expense_category.edit_Modal',$Expense);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'expense_name'    => 'required',
            'expense_description'   => 'required',
            'expense_status' => 'required',
        ]);
        $data = [
            'expense_name'    => $request->expense_name,
            'expense_description'   => $request->expense_description,
            'expense_status'   => $request->expense_status,
        ];
        $id = $request->expense_catagory_id;
        Expense::where('expense_catagory_id', $id)->update($data);
        $response = [
            'msgtype' => 'success',
            'message' => 'Expense Catagory Update Successfully',
        ];
        echo json_encode($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Expense::where('expense_catagory_id', $id)->delete();
        $response = [
            'msgtype' => 'success',
            'message' => 'Data Deleted Successfully',
        ];
        echo json_encode($response);
    }
}
