<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\Authenticatable;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class UserNilaimu extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'user_nilaimus';
}
