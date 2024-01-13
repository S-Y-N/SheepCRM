<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CreateController extends Controller
{
    public function __invoke()
    {
        $companies = Company::all();
        return view('employee.create', compact('companies'));
    }
}
