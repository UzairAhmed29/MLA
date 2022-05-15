<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function client() {
	    return $this->belongsTo(Client::class, 'client_id');
    }
}
