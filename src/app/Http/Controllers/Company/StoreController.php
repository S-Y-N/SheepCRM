<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\StoreRequest;
use App\Mail\Company\NewCompanyMail;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;

\Tinify\setKey("226vKpJl5STXRVx2bTSC2SfsxSNWj2jb");

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $email = 'admin@admin.com';

       $requestData = $request->validated();
       $nameCompany = $request->input('name');

       $filePath = $request->file('logo')->path();

       $source = \Tinify\fromFile($filePath);

       $compFN = time().'_'.uniqid().'_'.$request->file('logo')->getClientOriginalName();

       $compPath = 'storage/images/'.$compFN;
        //dd($compPath);
       $source->toFile(public_path($compPath));
       $requestData['logo'] = $compPath;
       //dd($requestData);
       Company::create($requestData);
       Mail::to($email)->send(new NewCompanyMail($nameCompany));
       return redirect()->route('company.index');
    }
}
