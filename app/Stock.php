<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table="stocks";
    protected $primaryKey="stock_id";
    protected $fillable=['batch_id', 'medicine_code', 'expire_date', 'stock_status'];
}
