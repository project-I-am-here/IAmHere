<?php
namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Patient extends Model
{
    use Authenticatable, Authorizable;
    protected $table = "patient";

    protected $fillable = [
        'id',
        'crp_professional',
        'celphone',
        'observation',
        'graduation',
        'responsible',
        'id_account'
    ];

    public $timestamps = false;
}

