<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RetailSaleChild extends Model
{

    protected $table = 'retail_sale_medicines';
    protected $primaryKey = 'whole_sale_detail_id';
    protected $fillable = ['invoice_id', 'medicine_code', 'quantity', 'sub_total']; 

}
