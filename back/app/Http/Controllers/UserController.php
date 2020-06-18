<?php

namespace App\Http\Controllers;

use App\Models\Account;
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
        //$this->middleware('auth');
        $this->model = $account;
    }

    public function profile()
    {
        return response()->json(['user' => Auth::user()], 200);
    }

    public function getAll(){
        $account = $this->model->all();
        if(count($account) > 0){
            return response()->json($account, Response::HTTP_OK);
        }else{
            return response()->json([], Response::HTTP_OK);
        }
    }

    public function get($id_account){
        $account = $this->model->find($id_account);

        return response()->json($account, Response::HTTP_OK);

    }
    public function store(Request $request){
        $account = $this->model->create($request->all());
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
