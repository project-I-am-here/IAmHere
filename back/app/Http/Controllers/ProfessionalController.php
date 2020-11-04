<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Professional;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class ProfessionalController extends Controller
{
    /**
     * Instantiate a new ProfessionalController instance.
     *
     * @return void
     */

    private $model;

    public function __construct(Professional $professional)
    {
        //$this->middleware('auth');
        $this->model = $professional;
    }

    public function getAll(){
        $account = Account::with('address')
            ->with('professional')
            ->where('type', '2')
            ->get();

        if(count($account) > 0){
            return response()->json($account, Response::HTTP_OK);
        }else{
            return response()->json([array('msg' => 'Nenhum registro encontrado')], Response::HTTP_EXPECTATION_FAILED);
        }
    }

    public function get($id_professional){
        $professional = $this->model->find($id_professional);
        return response()->json($professional, Response::HTTP_OK);
    }

    public function getMyPatients($id_professional){
        $items = $this->model->getMyPatients($id_professional);
        return response()->json($items, Response::HTTP_OK);
    }

    public function store(Request $request){
        $professional= $this->model->create($request->all());
        return response()->json($professional, Response::HTTP_CREATED);
    }

    public function update($id, Request $request){
        $professional = $this->model->find($id)
            ->update($request->all());

        return response()->json($professional, Response::HTTP_OK);
    }

    public function destroy($id){
        $professional = $this->model->find($id)
            ->delete();

        return response()->json(null, Response::HTTP_OK);
    }

    //Atualiza Clinica do profissional
    public function joinClinic($id){

        $Professional =   $this->model->where('id_account', '=', Auth::user()->id )->update(['id_clinic' => $id]);
        if($Professional ) {
            return response()->json(array('msg' => 'Registrado com sucesso!!'), Response::HTTP_OK);
        }
        else{
            return response()->json([array('msg' => 'Erro ao adicionar afiliação')], Response::HTTP_EXPECTATION_FAILED);
        }
    }

    //remove Clinica do profissional
    public function deleteClinic($id){

        $Professional =   $this->model->where('id_account', '=', $id )->update(['id_clinic' => '']);
        if($Professional ) {
            return response()->json(array('msg' => 'Removido com sucesso!!'), Response::HTTP_OK);
        }
        else{
            return response()->json([array('msg' => 'Erro ao remover afiliação')], Response::HTTP_EXPECTATION_FAILED);
        }
    }

}
