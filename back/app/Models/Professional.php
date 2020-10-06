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

    public function getMyPatients($professional)
    {

        $items = [];
        $result = Account::where(['account.type' => 1, 'patient.id_professional' => $professional])
            ->join('patient', 'account.id', '=', 'patient.id_account')
            ->join('adress', 'adress.id', '=', 'account.id_adress')
            ->select(
                '*'
            )
            ->get();

        foreach ($result as $item) {
            array_push($items, [
                'id' => $item['id_account'],
                'name' => $item['name'],
                'email' => $item['email'],
                'type' => $item['type'],
                'phone' => $item['phone'],
                'birtdate' => $item['surname'],
                'cpf' => $item['surname'],
                'rg' => $item['surname'],
                'naturality' => $item['surname'],
                'profession' => $item['profession'],
                'status' => $item['status'],
                'celphone' => $item['celphone'],
                'graduation' => $item['graduation'],
                'address' => array ([
                    'street'=> $item['street'],
                    'number'=> $item['number'],
                    'neighborhood'=> $item['neighborhood'],
                    'city'=> $item['city'],
                    'state'=> $item['state'],
                    'zipcod'=> $item['zipcod'],
                ])
            ]);
        }
        return $items;
    }

    public $timestamps = false;
}

