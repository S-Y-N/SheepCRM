<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\UpdateRequest;
use App\Models\Company;
use function Tinify\fromFile;

\Tinify\setKey("226vKpJl5STXRVx2bTSC2SfsxSNWj2jb");
class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Company $company)
    {
        $data = $request->validated();

        $filePath = $request->file('logo')->path();
        $source = fromFile($filePath);;

        $compFN = time().'_'.uniqid().'_'.$request->file('logo')->getClientOriginalName();
        $compPath = 'storage/images/'.$compFN;
        $source->toFile(public_path($compPath));
        $data['logo'] = $compPath;

        $company->update($data);
        return redirect()->route('company.index');
    }
}
