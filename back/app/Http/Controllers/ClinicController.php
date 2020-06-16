<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class ClinicController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */

    private $model;

    public function __construct(Clinic $clinic)
    {
        //$this->middleware('auth');
        $this->model = $clinic;
    }


//    public function profile()
//    {
//        return response()->json(['user' => Auth::user()], 200);
//    }

    public function getAll(){
        $clinic = $this->model->all();
        if(count($clinic) > 0){
            return response()->json($clinic, Response::HTTP_OK);
        }else{
            return response()->json([], Response::HTTP_OK);
        }
    }

    public function get($id_clinic){
        $clinic = $this->model->find($id_clinic);

        return response()->json($clinic, Response::HTTP_OK);

    }
    public function store(Request $request){
        $clinic = $this->model->create($request->all());
        return response()->json($clinic, Response::HTTP_CREATED);
    }
    public function update($id_clinic, Request $request){
        $clinic= $this->model->find($id_clinic)
            ->update($request->all());

        return response()->json($clinic, Response::HTTP_OK);
    }

    public function destroy($id_clinic){
        $account = $this->model->find($id_clinic)
            ->delete();

        return response()->json(null, Response::HTTP_OK);
    }

}
