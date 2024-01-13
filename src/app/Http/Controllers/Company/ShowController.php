<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;

class ShowController extends Controller
{
    public function __invoke(Company $company)
    {
        return view('company.show',compact('company'));
    }
}
