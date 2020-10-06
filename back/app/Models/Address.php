<?php
namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Address extends Model
{
    use Authenticatable, Authorizable;
    protected $table = "adress";

    protected $fillable = [
        'id',
        'street',
        'number',
        'neighborhood',
        'city',
        'state',
        'zipcod'
    ];

    public $timestamps = false;

    public function account() {
        return  $this->belongsTo(Account::class, 'id_adress', 'id');
    }
}

