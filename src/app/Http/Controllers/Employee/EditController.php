<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;

class EditController extends Controller
{
    public function __invoke(Employee $employee)
    {
        $companies = Company::all();
        return view('employee.edit',compact('employee','companies'));
    }
}
