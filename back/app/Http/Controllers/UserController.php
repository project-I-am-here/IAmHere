<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Patient;
use App\Models\Professional;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */

    private $model;

    public function __construct(Account $account)
    {
        $this->middleware('auth');
        $this->model = $account;
    }

    public function profile()
    {
        $account_id = Auth::user()->id;

        //buscar dados por type
        if(Auth::user()->type==1){
            $account = Account::where('id', $account_id)->with('patient', 'address')->first();
            return response()->json($account, Response::HTTP_OK);
        }
        else{
            $account = Account::where('id', $account_id)->with('professional', 'address')->first();
            return response()->json($account, Response::HTTP_OK);
        }

    }

    public function getAll(){
        $account = $this->model->all();

        if(count($account) > 0){
            return response()->json($account, Response::HTTP_OK);
        }else{
            return response()->json([], Response::HTTP_OK);
        }
    }

    public function getType(){
        $items = $this->model->getByType(Auth::user()['type']);
        return response()->json($items, Response::HTTP_OK);
    }

    public function get($id_account){
        $account = $this->model->find($id_account);
        return response()->json($account, Response::HTTP_OK);
    }

    public function store(Request $request){
        $account = $this->model->create($request->all());
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
