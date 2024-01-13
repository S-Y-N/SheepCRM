<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class DeauthenticateController extends Controller
{
    public function __invoke(Request $request)
    {
        if(!Auth::check())
            return;

        Auth::logout();

        return redirect()->route('main.index');
    }
}
