<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Account extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable;
    protected $table = "account";

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'type',
        'phone',
        'birtdate',
        'cpf',
        'rg',
        'naturality',
        'profession',
        'id_adress',
        'status'
    ];



    //Busca o objeto Adress
    public function address() {
        return  $this->hasMany(Address::class, 'id', 'id_adress');
    }

    //Busca o objeto Patient
    public function patient() {
        return  $this->hasMany(Patient::class, 'id_account', 'id');
    }

    //Busca o objeto Professional
    public function professional() {
        return  $this->hasMany(Professional::class, 'id_account', 'id');
    }

    protected $hidden = [
        'password',
    ];

    public function getJWTIdentifier()
    {
        return $this->id;
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'type' => $this->type,
        ];
    }

    public $timestamps = false;
}
