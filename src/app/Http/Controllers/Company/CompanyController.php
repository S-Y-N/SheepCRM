<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Image;
use App\Http\Controllers\Search;
use App\Http\Requests\Company\StoreRequest;
use App\Http\Requests\Company\UpdateRequest;
use App\Mail\Company\NewCompanyMail;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class CompanyController extends Controller
{
    public function index():View
    {
      $companies = Company::all();
      return view('company.index',compact('companies'));
    }

    public function create():View
    {
        return view('company.create');
    }

    public function store(StoreRequest $request, Image $image):RedirectResponse
    {
        $email = 'admin@admin.com';

        $requestData = $request->validated();
        $nameCompany = $request->input('name');

        $compPath = $image->uploadLogo($request);

        $requestData['logo'] = $compPath;

        Company::create($requestData);
        Mail::to($email)->send(new NewCompanyMail($nameCompany));

        return redirect()->route('company.index');
    }

    public function show(Company $company):View
    {
        return view('company.show', compact('company'));
    }

    public function edit(Company $company):View
    {
        return view('company.edit', compact('company'));
    }

    public function update(UpdateRequest $request, Image $image, Company $company):RedirectResponse
    {
        $data = $request->validated();

        $compPath = $image->uploadLogo($request);
        $data['logo'] = $compPath;

        $company->update($data);

        return redirect()->route('company.index');
    }

    public function destroy(Company $company):RedirectResponse
    {
        $company->delete();
        return redirect()->route('company.index');
    }

    public function search(Request $request, Search $search): JsonResponse
    {
        $builder = DB::table('companies');
        return $search->handleSearch($request,$builder);
    }
}
