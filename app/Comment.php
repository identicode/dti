<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'comment',
    	'user_id',
    	'timestamp'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
