<?php
namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Clinic extends Model
{
    use Authenticatable, Authorizable;
    protected $table = "clinic";

    protected $fillable = [
        'id',
        'name',
        'phone',
        'id_adress',
        'id_account',
        'status'
    ];

    public function address() {
        return  $this->hasMany(Address::class, 'id', 'id_adress');
    }

    public $timestamps = false;
}

