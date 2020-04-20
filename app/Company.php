<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $primaryKey = 'company_id';
    protected $fillable = ['company_name', 'company_phone', 'company_email', 'company_address', 'company_status'];

    public function validation()
    {
    	return [
    		'company_name'    => 'required',
            'company_phone'   => 'required',
            'company_email'   => 'required',
            'company_address' => 'required',
            'company_status'  => 'required',
    	];
    }
}
