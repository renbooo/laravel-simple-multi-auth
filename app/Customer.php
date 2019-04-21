<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
	protected $table = 'customers';
    protected $fillable = [
      'username',
      'email',
      'password'
	];
	protected $hidden = [
	     'password', 'remember_token'
	];

	public function setPasswordAttribute($val)
	{
	     return $this->attributes['password'] = bcrypt($val);
	}
}
