<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name',
        'lsrp',
    	'srp',
    	'cat_id',
    	'size',
    	'timestamp'
    ];

    public $timestamps = false;

    public function category()
    {
    	return $this->belongsTo('App\Category', 'cat_id');
    }
}
