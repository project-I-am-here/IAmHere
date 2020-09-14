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

    public function getClinic($id) {
        $items = [];

        $result = Clinic::where('clinic.id', $id)
            ->join('adress', 'clinic.id_adress', '=', 'adress.id')
            ->select(
                'clinic.id',
                'clinic.name',
                'clinic.id_account',
                'clinic.phone',
                'adress.street',
                'adress.number',
                'adress.neighborhood',
                'adress.state',
                'adress.zipcod'
            )
            ->where(
                'clinic.status', '=', '1'
            )
            ->get();

        //echo $result[0]['id'];
        $items = [
            'id' => $result[0]['id'],
            'name' => $result[0]['name'],
            'id_account' => $result[0]['id_account'],
            'phone' => $result[0]['id_account'],
            'adress' => [
                'street' => $result[0]['street'],
                'number' => $result[0]['number'],
                'neighborhood' => $result[0]['neighborhood'],
                'state' => $result[0]['state'],
                'zipcod' =>$result[0]['zipcod'],
            ],
        ];

        return $items;
    }

    public $timestamps = false;
}

