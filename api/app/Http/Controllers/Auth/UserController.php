<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }
    public function __invoke(Request $request)
    {
        // dd($request->user());

        $user = $request->user();
        return response()->json([
            'email'=>$user->email,
            'name'=>$user->name,
        ]);
    }
}
