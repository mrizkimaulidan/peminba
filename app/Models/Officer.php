<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Officer extends Authenticatable
{
    use HasFactory;

    protected $guard = 'officer';

    protected $fillable = ['name', 'email', 'password', 'phone_number'];
}
