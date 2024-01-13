<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class DeleteController extends Controller
{
    public function __invoke(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index');
    }
}
