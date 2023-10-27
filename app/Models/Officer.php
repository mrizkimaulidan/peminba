<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Officer extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $guard = 'officer';

    protected $fillable = ['name', 'email', 'password', 'phone_number'];
}
