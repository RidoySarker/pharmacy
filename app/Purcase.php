<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purcase extends Model
{
    protected $table = 'purcases';
    protected $primaryKey = 'purcase_id';
    protected $fillable = ['date','batch_id','expire_date', 'company_name', 'medicine_code', 'quantity', 'sub_total', 'grand_total', 'pay', 'rest'];

    public function validation()
    {
    	return [

    		'date'          => 'required',
    		'batch_id'		=> 'required',
    		'expire_date'   => 'required',
            'company_name'  => 'required',
            'medicine_code' => 'required',
            'quantity'      => 'required',
            'sub_total'     => 'required',
            'grand_total'   => 'required',
            'pay'           => 'required',
            'rest'          => 'required',
    	];
    }

    public function message()
    {
    	return [

    		'pay.required' => 'Pay is Required',
    	];
    }
}
