<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class GenerateImageController extends Controller
{
    public function __invoke(ImageRequest $request): Response
    {
        $image = new Image($request->validated());
        $pattern = $image->getImage();

        return response($pattern->getImageBlob())
            ->withHeaders([
                'Content-Type' => $pattern->getImageMimeType(),
                'Content-Disposition' => $this->getDisposition($image),
            ]);
    }

    /**
     * Generates an HTTP Content-Disposition field-value with filename.
     *
     * @param  Image  $image
     * @return string
     */
    protected function getDisposition(Image $image): string
    {
        return (new Response)->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            $image->getFilename()
        );
    }
}
