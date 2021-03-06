<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $login = $request->validate([
            'email'     => 'email',
            'password'  => 'required|string'
        ]);
        if (!Auth::validate($login)) {
            return response(['message' => 'Invalid Login']);
        }
        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        return response(['user' => Auth::user(), 'access_token' => $accessToken]);
    }

}
