<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Models\Image;

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
                'content-type' => $pattern->getImageMimeType(),
            ]);
    }

    /**
     * Download a background image
     */
    public function download(ImageRequest $request)
    {
        $image = new Image($request->validated());
        $pattern = $image->getImage();

        // Create a unique filename
        $hash = md5(json_encode($image->getAttributes()));
        $filename = substr(base_convert($hash, 16, 36), 0, 8);

        return response()
            ->streamDownload(
                function () use ($pattern) {
                    echo $pattern->getImageBlob();
                },
                $filename . '.' . $pattern->getImageFormat(),
                ['content-type' => $pattern->getImageMimeType()]
            );
    }
}
