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
     * Instantiate a new UserController instance.
     *
     * @return void
     */

    private $model;

    public function __construct(Professional $professional)
    {
        //$this->middleware('auth');
        $this->model = $professional;
    }


    public function profile()
    {
        return response()->json(['user' => Auth::user()], 200);
    }

    public function getAll(){
        $professional = $this->model->all();
        if(count($professional) > 0){
            return response()->json($professional, Response::HTTP_OK);
        }else{
            return response()->json([], Response::HTTP_OK);
        }
    }

    public function get($id_professional){
        $professional = $this->model->find($id_professional);
        return response()->json($professional, Response::HTTP_OK);

    }
    public function store(Request $request){
        $professional= $this->model->create($request->all());
        return response()->json($professional, Response::HTTP_CREATED);
    }
    public function update($id_professional, Request $request){
        $professional = $this->model->find($id_professional)
            ->update($request->all());

        return response()->json($professional, Response::HTTP_OK);
    }

    public function destroy($id_professional){
        $professional = $this->model->find($id_professional)
            ->delete();

        return response()->json(null, Response::HTTP_OK);
    }

}
