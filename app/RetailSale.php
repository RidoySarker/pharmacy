<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RetailSale extends Model
{
     protected $table = 'retail_sales';
    protected $primaryKey = 'retail_sale_id';
    protected $fillable = ['date', 'customer_name', 'invoice_id', 'grand_total', 'payment'];

}
