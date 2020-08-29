<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class AdressController extends Controller
{
    /**
     * Instantiate a new ClinicController instance.
     *
     * @return void
     */

    private $model;

    public function __construct(Adress $adress)
    {
        $this->middleware('auth');
        $this->model = $adress;
    }

    public function getAll(){
        $adress = $this->model->all();
        if(count($adress) > 0){
            return response()->json($adress, Response::HTTP_OK);
        }else{
            return response()->json([], Response::HTTP_OK);
        }
    }

    public function get($id_adress){
        $adress = $this->model->find($id_adress);

        return response()->json($adress, Response::HTTP_OK);

    }
    public function store(Request $request){
        $adress= $this->model->create($request->all());
        return response()->json($adress, Response::HTTP_CREATED);
    }
    public function update($id, Request $request){
        $adress= $this->model->find($id)
            ->update($request->all());

        return response()->json($adress, Response::HTTP_OK);
    }

    public function destroy($id_adress){
        $adress = $this->model->find($id_adress)
            ->delete();

        return response()->json(null, Response::HTTP_OK);
    }

}
