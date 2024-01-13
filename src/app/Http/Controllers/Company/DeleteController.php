<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;

class DeleteController extends Controller
{
    public function __invoke(Company $company)
    {
        $company->delete();
        return redirect()->route('company.index');
    }
}
