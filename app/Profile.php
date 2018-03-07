<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';

    protected $fillable = [
        'user_id', 'phone', 'gender', 'd_o_b', 'profile_pic', 'customer_id'
    ];

    //User Model Relationship function
	public function user()
	{ dd(123);
	    return $this->belongsTo('App\User');
	}

}
