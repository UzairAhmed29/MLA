<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    protected $guarded = ['id', 'created_at', 'deleted_at'];
}
