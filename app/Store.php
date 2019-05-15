<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name', 'address'];

    public $timestamps = false;

    public function product()
    {
    	return $this->hasMany('App\Master', 'store_id');
    }
}
