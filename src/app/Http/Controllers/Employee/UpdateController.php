<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\UpdateRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public const DATA_FIELDS = [
        'company_id',
        'first_name',
        'last_name',
        'email',
        'phone',

    ];
    public function __invoke(UpdateRequest $request, Employee $employee)
    {
        //$data = $request->only(UpdateController::DATA_FIELDS);
        $data = $request->validated();
        $employee->update($data);

        return redirect()->route('employee.index');
    }
}
