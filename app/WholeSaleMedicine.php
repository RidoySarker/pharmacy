<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WholeSaleMedicine extends Model
{
    protected $table = 'whole_sale_medicines';
    protected $primaryKey = 'whole_sale_medicine_id';
    protected $fillable = ['invoice_id', 'medicine_code', 'quantity', 'sub_total']; 

    public function validation()
    {
    	return [
	    	'invoice_id'    => 'required',
	    	'medicine_code' => 'required',
	    	'quantity'      => 'required',
	    	'sub_total'     => 'required',
	    ];
    }
}
