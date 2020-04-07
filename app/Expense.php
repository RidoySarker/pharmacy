<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['expense_name', 'expense_description', 'expense_status'];
    protected $primaryKey = 'expense_catagory_id';
}
