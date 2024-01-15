<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use App\Http\Requests\Company\StoreRequest;
use App\Mail\Company\NewCompanyMail;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;

\Tinify\setKey("226vKpJl5STXRVx2bTSC2SfsxSNWj2jb");

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, ImageController $image)
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
}
