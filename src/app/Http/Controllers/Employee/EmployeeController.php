<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Search;
use App\Http\Requests\Employee\StoreRequest;
use App\Http\Requests\Employee\UpdateRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index():View
    {
        return view('employee.index');
    }

    public function create():View
    {
        $companies = Company::all();
        return view('employee.create',compact('companies'));
    }

    public function store(StoreRequest $request):RedirectResponse
    {
        $data = $request->validated();
        Employee::create($data);
        return redirect()->route('employee.index');
    }

    public function show(Employee $employee):View
    {
        return view('employee.show',compact('employee'));
    }

    public function edit(Employee $employee):View
    {
        $companies = Company::all();
        return view('employee.edit',compact('employee','companies'));
    }

    public function update(UpdateRequest $request, Employee $employee):RedirectResponse
    {
        $data = $request->validated();
        $employee->update($data);
        return redirect()->route('employee.index');
    }

    public function destroy(Employee $employee):RedirectResponse
    {
        $employee->delete();
        return redirect()->route('employee.index');
    }
    public function search(Request $request, Search $search): JsonResponse
    {
        $builder = DB::table('employees')
            ->join('companies','employees.company_id','=','companies.id');
        return $search->handleSearch($request,$builder);
    }
}
