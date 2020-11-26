<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignInController extends Controller
{
    public function __invoke(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if(!($token = auth()->attempt($credentials)))
        {
            return response(null, 401);
        }

        return response()->json(compact('token'));
    }
 }
