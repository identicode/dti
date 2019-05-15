<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $fillable = ['price', 'product_id', 'store_id', 'timestamp'];

    public $timestamps = false;

    public function product()
    {
    	return $this->belongsTo('App\Product', 'product_id');
    }

    public function store()
    {
    	return $this->belongsTo('App\Store', 'store_id');
    }
}
