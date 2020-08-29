<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\ScheduleConfig;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class ScheduleController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */

    private $model;

    public function __construct(ScheduleConfig $scheduleConfig)
    {
        //$this->middleware('auth');
        $this->model = $scheduleConfig;
    }

    public function getAll(){

        $items = [];
        $scheduleConfig = $this->model->all();

        foreach ($scheduleConfig as $config) {
            $hours = $config->hour_start;
            $result = Account::where('id', $config->professional_id)
//                ->join('patient', 'account.id', '=', 'patient.id_account')
                ->select(
                    'id',
                    'name',
                    'phone'
                )->get();

            while ($hours<=$config->hour_end){
                $hours = date('H:i',strtotime("$hours + $config->interval minutes"));

                array_push($items,
                    [
                        'hour' => $hours,
                        'professional' => [
                            $result,
                        ],
                        'patient' => [
                            'id' => '',
                            'name' => '',
                            'phone' => ''
                        ],
                    ]);
            }

        }

        if(count($items) > 0){
            return response()->json($items , Response::HTTP_OK);
        }else{
            return response()->json([], Response::HTTP_OK);
        }
    }

}
