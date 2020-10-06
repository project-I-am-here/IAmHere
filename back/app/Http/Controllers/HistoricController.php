<?php

namespace App\Http\Controllers;

use App\Models\Historic;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class HistoricController extends Controller
{
    /**
     * Instantiate a new ClinicController instance.
     *
     * @return void
     */

    private $model;

    public function __construct(Historic $historic)
    {
//        $this->middleware('auth');
        $this->model = $historic;
    }

    public function getAll($id_patient){
        $historic = $this->model->where('id_patient', '=', $id_patient)->get();

        if($id_patient == Auth::user()->id || Auth::user()->type == 2) {
            if (count($historic) > 0) {
                return response()->json($historic, Response::HTTP_OK);
            } else {
                return response()->json([array('msg' => 'Nenhum registro encontrado')], Response::HTTP_EXPECTATION_FAILED);
            }
        }
    }

    public function get($id){
        $historic = $this->model->find($id);
        return response()->json($historic, Response::HTTP_OK);
    }

    public function store(Request $request){
        $data = $request->all();
        unset($data['id']);
        $data['date'] = now();
        $data['id_professional'] = Auth::user()->id;

        $historic= $this->model->create($data);
        return response()->json($historic, Response::HTTP_CREATED);
    }

    public function update($id, Request $request){
        $data = $request->all();
        $historic= $this->model->find($id);

        if($historic->id_professional == Auth::user()->id){
            $historic = $this->model->find($id)
                ->update(['description' => $data['description']]);
            return response()->json(array('msg'=>'Historico atualizado com sucesso!!'), Response::HTTP_OK);
        }
        else{
            return response()->json(array('msg'=>'Você não pode alterar este registro'), Response::HTTP_EXPECTATION_FAILED);
        }
    }

    public function destroy($id){
        $historic = $this->model->find($id)
            ->delete();

        return response()->json(null, Response::HTTP_OK);
    }

}
