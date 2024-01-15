<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Tinify\fromFile;
use function Tinify\setKey;

class ImageController
{
    public function uploadLogo(Request $request)
    {
        setKey(env('TINY_PNG_API_KEY',''));
        $filePath = $request->file('logo')->path();
        $source = fromFile($filePath);
        $compFN = time() . '_' . uniqid() . '_' . $request->file('logo')->getClientOriginalName();
        $compPath = 'storage/images/' . $compFN;
        $source->toFile(public_path($compPath));

        return $compPath;
    }


}
