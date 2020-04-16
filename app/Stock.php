<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table="stocks";
    protected $primaryKey="stock_id";
    protected $fillable=['batch_id','expire_date','medicine_code','total_stock','stock_id'];
}
