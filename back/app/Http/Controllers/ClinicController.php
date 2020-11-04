<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Address;
use App\Models\Clinic;
use App\Models\Professional;
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
//        $this->middleware('auth');
        $this->model = $clinic;
    }

//    public function getAll(){
//        $clinic = $this->model->all();
//        if(count($clinic) > 0){
//            return response()->json($clinic, Response::HTTP_OK);
//        }else{
//            return response()->json([], Response::HTTP_OK);
//        }
//    }

    public function getAll(){
        $clinic = Clinic::with('address')->get();
        return response()->json($clinic, Response::HTTP_OK);
    }

    public function get($id){
        $items = $this->model->where('id', '=', $id)->with('address')->get();

        if(count($items) > 0){
            return response()->json($items, Response::HTTP_OK);
        }
       else{
           return response()->json([array('msg' => 'Nenhum registro encontrado')], Response::HTTP_EXPECTATION_FAILED);
        }
    }


    public function store(Request $request){
        $data = $request->all();
        $data['id_account'] = Auth::user()->id;
        unset($data['id']);
        $clinic = $this->model->create($data);

        $adress = Address::create([
            'street' => $data['street'],
            'number' => $data['number'],
            'neighborhood' => $data['neighborhood'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zipcod' => $data['zipcod']
        ]);

        $this->model->find($clinic->id)->update(['id_adress' => $adress->id]);
        Professional::find($data['id_account'])->update(['id_clinic' => $data['id']]);

        return response()->json($clinic, Response::HTTP_CREATED);
    }

    public function update($id, Request $request){
        $data = $request->all();
        unset($data['id']);
        $clinic = $this->model->find($id)->update($data);

        $adress = $data['address'][0] ;

        Address::find($data['id_adress'])->update([
            'street' => $adress['street'],
            'number' => $adress['number'],
            'neighborhood' => $adress['neighborhood'],
            'city' => $adress['city'],
            'state' => $adress['state'],
            'zipcod' => $adress['zipcod'],
        ]);

        return response()->json($clinic, Response::HTTP_OK);
    }

    public function destroy($id_clinic){
        $clinic = $this->model->find($id_clinic)
            ->delete();

        return response()->json(null, Response::HTTP_OK);
    }

}
