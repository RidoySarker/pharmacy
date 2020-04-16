<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purcase extends Model
{
    protected $table = 'purcases';
    protected $primaryKey = 'purcase_id';
    protected $fillable = ['date','batch_id','expire_date', 'company_name', 'medicine_code', 'quantity', 'sub_total', 'grand_total', 'pay', 'rest'];
}
