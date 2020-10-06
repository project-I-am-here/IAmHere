<?php
namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Mood extends Model
{
    use Authenticatable, Authorizable;
    protected $table = "mood";

    protected $fillable = [
        'id',
        'type',
        'description',
        'id_patient',
        'date'
    ];

    public $timestamps = false;
}

