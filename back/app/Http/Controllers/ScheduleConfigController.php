<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\ScheduleConfig;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class ScheduleConfigController extends Controller
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

    public function get($id){
        $config = $this->model->find($id);
        if(!empty($config)){
            return response()->json($config, Response::HTTP_OK);
        }else{
            return response()->json(array('msg'=>'Nenhum registro encontrado.'), Response::HTTP_OK);
        }
    }

    public function getConfigProfessional($id){
        $config = $this->model->where('id_professional', '=' , $id);
        if(count($config) > 0){
            return response()->json($config, Response::HTTP_OK);
        }else{
            return response()->json(array('msg'=>'Nenhum registro encontrado.'), Response::HTTP_OK);
        }
    }

    public function store(Request $request){
        $data = $request->all();
        $data['id_professional'] = Auth::user()->id;
        unset($data['id']);
        $config = $this->model->create($data);
        if(!empty($config)){
            return response()->json($config, Response::HTTP_CREATED);
        }else{
            return response()->json(array('msg'=>'Falha ao cadastrar.'), Response::HTTP_EXPECTATION_FAILED);
        }
    }
    public function update($id, Request $request){
        $data = $request->all();
        $data['id_professional'] = Auth::user()->id;
        $config= $this->model->find($id)
            ->update($data);

        return response()->json($config, Response::HTTP_OK);
    }

    public function destroy($id){
        $config = $this->model->find($id)
            ->delete();

        return response()->json(array('msg'=>'Removido com sucesso.'), Response::HTTP_OK);
    }
}
