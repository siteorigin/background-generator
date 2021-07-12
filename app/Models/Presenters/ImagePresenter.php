<?php

namespace App\Models\Presenters;

use App\Models\Image;

/** @mixin Image */
trait ImagePresenter
{
    public function getFilename(): string
    {
        $hash = md5(json_encode($this->getAttributes()));
        $filename = substr(base_convert($hash, 16, 36), 0, 8);

        return "image-{$filename}.png";
    }
}
