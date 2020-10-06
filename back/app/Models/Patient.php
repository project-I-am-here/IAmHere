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
        'id_professional',
        'celphone',
        'observation',
        'graduation',
        'responsible',
        'id_account'
    ];


    public $timestamps = false;

    public function account()
    {
        return  $this->hasMany(Account::class, 'id', 'id_account');
    }

}

