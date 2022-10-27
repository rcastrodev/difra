<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Customer extends Model
{
    protected $fillable = ['name', 'password', 'email'];
}
