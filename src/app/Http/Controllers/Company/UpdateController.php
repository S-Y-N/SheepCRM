<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use App\Http\Requests\Company\UpdateRequest;
use App\Models\Company;
use function Tinify\fromFile;


class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, ImageController $image, Company $company)
    {
        $data = $request->validated();

        $compPath = $image->uploadLogo($request);
        $data['logo'] = $compPath;

        $company->update($data);
        return redirect()->route('company.index');
    }
}
