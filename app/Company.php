<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $primaryKey = 'company_id';
    protected $fillable = ['company_name', 'company_phone', 'company_email', 'company_address', 'company_status'];
}
