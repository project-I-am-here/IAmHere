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
        'surname',
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

    public function getByType($type) {
        $items = [];

        if ($type == '2') {
            $result = Account::where('type', 1)
                ->join('patient', 'account.id', '=', 'patient.id_account')
                ->select(
                    '*'
                )
                ->get();

            foreach ($result as $item) {
                array_push($items, [
                    'id' => $item['account_id'],
                    'name' => $item['account_name'],
                    'x' => [
                        'id' => 1
                    ],
                ]);
            }
        } else {
            $result = Account::where('type', 2)
                ->join('professional', 'account.id', '=', 'professional.id_account')
                ->select(
                    '*'
                )
                ->get();

            foreach ($result as $item) {
                array_push($items, [
                    'id' => $item['account_id'],
                    'name' => $item['account_name'],
                    'x' => [
                        'id' => 1
                    ],
                ]);
            }
        }

        return $result;
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
