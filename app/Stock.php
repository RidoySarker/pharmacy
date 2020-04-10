<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table="stocks";
    protected $primaryKey="stock_id";
    protected $fillable=['medicine_code','total_stock','stock_id'];
}
