<?php

namespace App\Http\Controllers;

use App\Models\Adress;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class ClinicController extends Controller
{
    /**
     * Instantiate a new ClinicController instance.
     *
     * @return void
     */

    private $model;

    public function __construct(Clinic $clinic)
    {
        $this->middleware('auth');
        $this->model = $clinic;
    }

    public function getAll(){
        $clinic = $this->model->all();
        if(count($clinic) > 0){
            return response()->json($clinic, Response::HTTP_OK);
        }else{
            return response()->json([], Response::HTTP_OK);
        }
    }

//    public function get($id){
//        $items = [];
//
//        $result = $this->model->find($id);
//        $adress = Adress::find($result->id_adress);
//
//        $items = [
//            'id' => $result['id'],
//            'name' => $result['name'],
//            'id_account' => $result['id_account'],
//            'phone' => $result['id_account'],
//            'adress' => [
//                'street' => $adress['street'],
//                'number' => $adress['number'],
//                'neighborhood' => $adress['neighborhood'],
//                'state' => $adress['state'],
//                'zipcod' =>$adress['zipcod'],
//            ],
//        ];
//
//        return response()->json($items, Response::HTTP_OK);
//
//    }

    public function get($id){
        $items = $this->model->getClinic($id);
        return response()->json($items, Response::HTTP_OK);
    }

    public function store(Request $request){
        $data = $request->all();
        $data['id_account'] = Auth::user()->id;
        $clinic = $this->model->create($data);

        $result = Adress::firstOrNew(['id_clinic' => $id], [
            'specialty' => '',
            'id_clinic' => $id,
            'id_account' => Auth::user()->id,
        ]);

        $result->save();

        return response()->json($clinic, Response::HTTP_CREATED);
    }

    public function update($id, Request $request){
        $data = $request->all();
        unset($data['id']);
        $clinic = $this->model->find($id)->update($data);

        $result = Adress::firstOrNew(['id_adress' => $data['id_adress']], [
            'street' => $data['street'],
            'number' => $data['number'],
            'neighborhood' => $data['neighborhood'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zipcod' => $data['zipcod'],
        ]);

        $result->save();

        return response()->json($clinic, Response::HTTP_OK);
    }

    public function destroy($id_clinic){
        $clinic = $this->model->find($id_clinic)
            ->delete();

        return response()->json(null, Response::HTTP_OK);
    }

}
