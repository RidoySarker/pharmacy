<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseFor extends Model
{
    protected $fillable = ['expense_name', 'expense_cost', 'expense_date'];
    protected $primaryKey = 'expense_for_id';
}
