<?php

namespace App\Http\Controllers;
use App\Expense;
use App\ExpenseFor;
use Illuminate\Http\Request;

class ExpenseForController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ExpenseFor['expensefor'] = ExpenseFor::orderBy('expense_for_id','desc')->get();
        return view('Admin.expense.expense_for.expense_for',$ExpenseFor);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Expense['expense'] = Expense::where('expense_status','Active')->get();
        return view('Admin.expense.expense_for.add_Modal',$Expense);
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
            'expense_cost'   => 'required',
            'expense_date' => 'required',
        ]);
        $data = [
            'expense_name'    => $request->expense_name,
            'expense_cost'   => $request->expense_cost,
            'expense_date'   => $request->expense_date,
        ];
        ExpenseFor::create($data);
        $response = [
            'msgtype' => 'success',
            'message' => 'Expense For Add Successfully',
        ];
        echo json_encode($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExpenseFor  $expenseFor
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseFor $expenseFor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExpenseFor  $expenseFor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Expense['expense'] = ExpenseFor::find($id);
        $Expense['expense_catagory'] = Expense::where('expense_status','Active')->get();
        return view('Admin.expense.expense_for.edit_Modal',$Expense);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExpenseFor  $expenseFor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'expense_name'    => 'required',
            'expense_cost'   => 'required',
            'expense_date' => 'required',
        ]);
        $data = [
            'expense_name'    => $request->expense_name,
            'expense_cost'   => $request->expense_cost,
            'expense_date'   => $request->expense_date,
        ];
        $id = $request->expense_for_id;
        ExpenseFor::where('expense_for_id',$id)->update($data);
        $response = [
            'msgtype' => 'success',
            'message' => 'Expense For Update Successfully',
        ];
        echo json_encode($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExpenseFor  $expenseFor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ExpenseFor::where('expense_for_id', $id)->delete();
        $response = [
            'msgtype' => 'success',
            'message' => 'Data Deleted Successfully',
        ];
        echo json_encode($response);
    }
}
