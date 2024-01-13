<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class ShowController extends Controller
{
    public function __invoke(Employee $employee)
    {
        return view('employee.show',compact('employee'));
    }
}
