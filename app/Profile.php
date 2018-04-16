<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';

    protected $fillable = [
        'user_id', 'phone', 'gender', 'profile_pic', 'customer_id', 'age_range', 'hair_color', 'eye_color', 'height', 'current_city'
    ];

    //User Model Relationship function
	public function user()
	{ 
	    return $this->belongsTo('App\User');
	}

}
