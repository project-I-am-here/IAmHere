<?php
namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Clinic extends Model
{
    use Authenticatable, Authorizable;
    protected $table = "clinic";

    protected $fillable = [
        'id',
        'name',
        'phone',
        'id_adress',
        'status'
    ];

    public $timestamps = false;
}

