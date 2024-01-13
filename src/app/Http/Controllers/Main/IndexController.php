<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view(
          'main.index',[
              'totalEmployees'=>Employee::count(),
              'employeesToday'=>Employee::where('created_at','>=',today())->count(),
              'employeesWeek'=>Employee::where('created_at','>=',$this->lastWeek())->count(),
              'totalCompanies'=>Company::count(),
              'companiesToday'=>Company::where('created_at','>=',today())->count(),
              'companiesWeek'=>Company::where('created_at','>=',$this->lastWeek())->count(),

            ]
        );
    }
    private function lastWeek()
    {
        return date_sub(today(),date_interval_create_from_date_string("7 days"));
    }
}
