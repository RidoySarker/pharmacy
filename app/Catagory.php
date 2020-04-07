<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    protected $table = 'catagories';
    protected $fillable = ['catagory_name', 'catagory_description', 'catagory_status'];
    protected $primaryKey = 'catagory_id';
}
