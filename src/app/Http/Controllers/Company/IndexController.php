<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;

class IndexController extends Controller
{
    public function __invoke()
    {
        $companies = Company::all();
        return view('company.index',compact('companies'));
    }
}
