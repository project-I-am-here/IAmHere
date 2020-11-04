<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Support\Collection;
use App\Models\ScheduleConfig;
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

    public function getScheduleClinic(){
        $today = date('Y-m-d');
        $items = new Collection([]);
        $scheduleConfig = $this->model->where('schedule_config.date_end','>=', $today)
            ->where('date_end','>=', $today)
//            ->join('account', 'account.id', '=', 'professional.id_account')
//            ->join('professional', 'professional.id_clinic', '=', 'account.id_account')
//            ->where('id','=', $id)
            ->get();

        //Montando a Agenda dinamica
        foreach ($scheduleConfig as $config) {
            $day_start = $config->date_start;
            $day_end = $config->date_end;

            //vefica se o dia de inicio da agenda é maior que o dia atual se for ele seta o dia para a data caso contrario ele setá para o dia atual
            if($day_start >= $today)
                $day = $day_start;

            else $day = $today;

            while ($day<= $day_end){
                $professional = Account::where('id','=', $config->id_professional)
                ->first();

                $hours = $config->hour_start;
                while ($hours<=$config->hour_end){
                    $items->push(
                        [
                            'day_hour' => $day. ' ' .$hours,
                            'hour' => $hours,
                            'professional' => [
                                'id' => $professional['id'],
                                'name' => $professional['name'],
                            ],
//                            'patient' => [
//                                'id' => '',
//                                'name' => '',
//                                'phone' => ''
//                            ],
                        ]);
                    $hours = date('H:i',strtotime("$hours + $config->interval minutes"));
                }

                $day = date('Y-m-d', strtotime("+1 day",strtotime($day)));

            }

        }

        if(count($items) > 0){
            $sorted = $items->sortBy('day_hour');
            return response()->json($sorted->values()->all(), Response::HTTP_OK);
        }else{
            return response()->json([], Response::HTTP_OK);
        }
    }
    public function getScheduleProfessional($id){
        $today = date('Y-m-d');
        $items = new Collection([]);
        $scheduleConfig = $this->model->where('date_end','>=', $today)
            ->where('id_professional','=', Auth::user()->id)
            ->get();

        //Montando a Agenda dinamica
        foreach ($scheduleConfig as $config) {
            $day_start = $config->date_start;
            $day_end = $config->date_end;

            //vefica se o dia de inicio da agenda é maior que o dia atual se for ele seta o dia para a data caso contrario ele setá para o dia atual
            if($day_start >= $today)
                $day = $day_start;

            else $day = $today;

            while ($day<= $day_end){
                $professional = Account::where('id','=', $config->id_professional)
                    ->first();

                $hours = $config->hour_start;
                while ($hours<=$config->hour_end){
                    $items->push(
                        [
                            'day_hour' => $day. ' ' .$hours,
                            'hour' => $hours,
                            'professional' => [
                                'id' => $professional['id'],
                                'name' => $professional['name'],
                            ],
//                            'patient' => [
//                                'id' => '',
//                                'name' => '',
//                                'phone' => ''
//                            ],
                        ]);
                    $hours = date('H:i',strtotime("$hours + $config->interval minutes"));
                }

                $day = date('Y-m-d', strtotime("+1 day",strtotime($day)));

            }

        }

        if(count($items) > 0){
            $sorted = $items->sortBy('day_hour');
            return response()->json($sorted->values()->all(), Response::HTTP_OK);
        }else{
            return response()->json([], Response::HTTP_OK);
        }
    }
    public function getSchedulePatient($id){
        $today = date('Y-m-d');
        $items = new Collection([]);
        $scheduleConfig = $this->model->where('date_end','>=', $today)
            ->where('id_professional','=', Auth::user()->id)
            ->get();

        //Montando a Agenda dinamica
        foreach ($scheduleConfig as $config) {
            $day_start = $config->date_start;
            $day_end = $config->date_end;

            //vefica se o dia de inicio da agenda é maior que o dia atual se for ele seta o dia para a data caso contrario ele setá para o dia atual
            if($day_start >= $today)
                $day = $day_start;

            else $day = $today;

            while ($day<= $day_end){
                $professional = Account::where('id','=', $config->id_professional)
                    ->first();

                $hours = $config->hour_start;
                while ($hours<=$config->hour_end){
                    $items->push(
                        [
                            'day_hour' => $day. ' ' .$hours,
                            'hour' => $hours,
                            'professional' => [
                                'id' => $professional['id'],
                                'name' => $professional['name'],
                            ],
//                            'patient' => [
//                                'id' => '',
//                                'name' => '',
//                                'phone' => ''
//                            ],
                        ]);
                    $hours = date('H:i',strtotime("$hours + $config->interval minutes"));
                }

                $day = date('Y-m-d', strtotime("+1 day",strtotime($day)));

            }

        }

        if(count($items) > 0){
            $sorted = $items->sortBy('day_hour');
            return response()->json($sorted->values()->all(), Response::HTTP_OK);
        }else{
            return response()->json([], Response::HTTP_OK);
        }
    }

}
