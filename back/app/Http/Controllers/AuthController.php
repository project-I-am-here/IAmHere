<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:account',
            'password' => 'required|confirmed',
        ]);

        try {

            $acount = new Account();

            $acount->name = $request->input('name');
            $acount->surname = $request->input('surname');
            $acount->email = $request->input('email');
            $plainPassword = $request->input('password');
            $acount->password = app('hash')->make($plainPassword);
            $acount->phone = $request->input('phone');
            $acount->birtdate = $request->input('birtdate');
            $acount->cpf = $request->input('cpf');
            $acount->rg = $request->input('rg');
            $acount->naturality = $request->input('naturality');
            $acount->profession = $request->input('profession');
            $acount->id_adress = $request->input('id_adress');
            $acount->status = $request->input('status');
            $acount->type = $request->input('type');

            $acount->save();

            //return successful response
            return response()->json(['account' => $acount, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }

    }

    public function login(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return [
            'token' => [
                'token'         => $token,
                'token_type'    => 'bearer',
            ],
            'user'  => Auth::user(),
        ];
    }


}
