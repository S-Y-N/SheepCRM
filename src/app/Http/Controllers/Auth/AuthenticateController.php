<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthenticateRequest;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function __invoke(AuthenticateRequest $request)
    {
        $data = $request->only('email','password');
        if(Auth::attempt(($data))){
           return redirect()->route('main.index');
        }

        return back()->onlyInput('email');
    }
}
