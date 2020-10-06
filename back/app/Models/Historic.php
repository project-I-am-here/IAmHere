<?php
namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Historic extends Model
{
    use Authenticatable, Authorizable;
    protected $table = "historic";

    protected $fillable = [
        'id',
        'id_patient',
        'id_professional',
        'description',
        'date'
    ];

    public $timestamps = false;
}

