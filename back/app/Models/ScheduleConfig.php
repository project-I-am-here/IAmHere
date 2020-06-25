<?php
namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Professional extends Model
{
    use Authenticatable, Authorizable;
    protected $table = "professional";

    protected $fillable = [
        'id',
        'especialidades',
        'crp',
        'id_clinic',
        'id_account',
        'status'
    ];

    public $timestamps = false;
}

