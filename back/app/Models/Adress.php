<?php
namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Adress extends Model
{
    use Authenticatable, Authorizable;
    protected $table = "adress";

    protected $fillable = [
        'id_adress',
        'street',
        'number',
        'neighborhood',
        'city',
        'state',
        'zipcod'
    ];

    public $timestamps = false;
}

