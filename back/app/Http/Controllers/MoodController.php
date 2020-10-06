<?php

namespace App\Http\Controllers;

use App\Models\Mood;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class MoodController extends Controller
{
    /**
     * Instantiate a new ClinicController instance.
     *
     * @return void
     */

    private $model;

    public function __construct(Mood $mood)
    {
//        $this->middleware('auth');
        $this->model = $mood;
    }

    public function get($id){
        $mood = $this->model->where('id_patient', $id)->get();

        if(count($mood) > 0){
            return response()->json($mood, Response::HTTP_OK);
        }else{
            return response()->json([], Response::HTTP_OK);
        }
    }
    public function store(Request $request){
        $data = $request->all();
        unset($data['id']);
        $data['date'] = now();
        $data['id_patient'] = Auth::user()->id;

        $historic= $this->model->create($data);
        return response()->json($historic, Response::HTTP_CREATED);
    }

}
