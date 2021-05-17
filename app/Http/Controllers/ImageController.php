<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class ImageController extends Controller
{
    /**
     * View a background image
     */
    public function view(ImageRequest $request)
    {
        $image = new Image($request->validated());
        $pattern = $image->getImage();

        return response($pattern->getImageBlob())
            ->withHeaders([
                'content-type' => $pattern->getImageMimeType()
            ]);
    }

    /**
     * Download a background image
     */
    public function download(ImageRequest $request)
    {
        $image = new Image($request->validated());
        $pattern = $image->getImage();

        return response()
            ->streamDownload(
                function() use ($pattern){
                    echo $pattern->getImageBlob();
                },
                'foo.png',
                ['content-type' => $pattern->getImageMimeType()]
            );
    }
}
