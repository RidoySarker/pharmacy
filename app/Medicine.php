<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $table = 'medicines';
    protected $primaryKey = 'medicine_id';
    protected $fillable = ['medicine_code', 'medicine_name', 'catagory', 'company_name', 'desk_name', 'purcase_price', 'retail_price', 'whole_sell_price', 'medicine_description', 'medicine_status'];
}
