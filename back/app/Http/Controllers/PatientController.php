<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Patient;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class PatientController extends Controller
{
    /**
     * Instantiate a new PatientController instance.
     *
     * @return void
     */

    private $model;

    public function __construct(Patient $patient)
    {
        //$this->middleware('auth');
        $this->model = $patient;
    }


    public function profile()
    {
        return response()->json(['user' => Auth::user()], 200);
    }

    public function getAll(){
        $patient = $this->model->all();
        if(count($patient) > 0){
            return response()->json($patient, Response::HTTP_OK);
        }else{
            return response()->json([], Response::HTTP_OK);
        }
    }

    public function get($id_patient){
        $patient = $this->model->find($id_patient);
        return response()->json($patient, Response::HTTP_OK);

    }
    public function store(Request $request){
        $patient= $this->model->create($request->all());
        return response()->json($patient, Response::HTTP_CREATED);
    }
    public function update($id_patient, Request $request){
        $patient = $this->model->find($id_patient)
            ->update($request->all());

        return response()->json($patient, Response::HTTP_OK);
    }

    public function destroy($id_patient){
        $patient = $this->model->find($id_patient)
            ->delete();

        return response()->json(null, Response::HTTP_OK);
    }

}
