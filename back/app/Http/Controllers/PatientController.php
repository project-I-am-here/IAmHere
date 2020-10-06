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
     * Instantiate a new UserController instance.
     *
     * @return void
     */

    private $model;

    public function __construct(Patient $patient)
    {
//        $this->middleware('auth');
        $this->model = $patient;
    }

    //Busca todos os pacientes
    public function getAll(){
        $account = Account::with('patient')
            ->where('type', '1')
            ->get();

//        echo $account->observation;
//        array_push($patient, [
//            'id' =>  $account['id'],
//            'name' =>  $account['name'],
//            'email' =>  $account['email'],
//            'email' =>  $account['email'],
//            'email' =>  $account['email'],
//
//        ]);

//        nome
//email
//celular
//id_professional
        return response()->json($account, Response::HTTP_OK);
    }

    //Busca por id do usuário
    public function get($id){
        $account = Account::where('id', $id)->with('patient', 'address')->get();
        return response()->json($account, Response::HTTP_OK);
    }

    public function search($name = null){
        $account = Account::with('address')
            ->with('patient')
            ->where([['name', 'like', "%$name%"],['type', '=' , 1]])
            ->get();

        return response()->json($account, Response::HTTP_OK);
    }

    public function store(Request $request){
        $data = $request->all();
        unset($data['id']);
        $account = $this->model->create($data);
        // Patient::create([]);
        return response()->json($account, Response::HTTP_CREATED);
    }

    public function update($id, Request $request){
        $account = $this->model->find($id)
            ->update($request->all());
        return response()->json($account, Response::HTTP_OK);

    }

    public function destroy($id){
        $account = $this->model->find($id)
            ->delete();

        return response()->json(null, Response::HTTP_OK);
    }

}
