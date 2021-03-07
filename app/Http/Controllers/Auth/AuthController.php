<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\{RegisterRequest, LoginRequest};
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\{JWTException};


class AuthController extends Controller
{

    protected $auth;

    public function __construct(JWTAuth $auth)
    {
        $this->middleware('api');
        $this->auth = $auth;
    }

    public function login(LoginRequest $request)
    {

        try {
            if(!$token = $this->auth->attempt($request->only('email', 'password')))
        {
            return response()->json([
                'error' => 'Could not sign you in with those details'
            ], 401);
        }

        } catch(JWTException $err) {
            return response()->json([
                'error' => [
                    'root' => 'Failed'
                ]
            ], 422);


        }

        return response()->json([
            'user' => $this->auth->user(),
            'meta' => [
                'token' => $token
            ]
            ], 200);

    }

    public function register(RegisterRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $this->auth->attempt($request->only(['email', 'password']));

        return response()->json([
            'user' => $user,
            'meta' => [
                'token' => $token
            ]
        ], 200);

    }

    public function logout()
    {
        $this->auth()->logout(true);
        return response(null, 200);
    }


    public function user(Request $request)
    {
        return response()->json([
            'data' => $request->user()
        ]);
    }
}
