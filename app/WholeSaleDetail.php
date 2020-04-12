<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WholeSaleDetail extends Model
{
    protected $table = 'whole_sale_details';
    protected $primaryKey = 'whole_sale_detail_id';
    protected $fillable = ['date', 'customer_name', 'invoice_id', 'grand_total', 'payment'];

    public function validation()
    {
    	return [
	    	'date'    		=> 'required',
	    	'customer_name' => 'required',
	    	'invoice_id'    => 'required',
	    	'grand_total'   => 'required',
	    	'payment'       => 'required',
	    ];
    }
}
