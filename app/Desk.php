<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desk extends Model
{
    protected $table = 'desks';
    protected $primaryKey = 'desk_id';
    protected $fillable = ['desk_name', 'desk_code', 'desk_description'];
}
