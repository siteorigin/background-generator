<?php

namespace App\Image;

use Imagick;
use ImagickPixel;

class CustomImagick extends Imagick
{
    public function overlayNoise($amount = 50): bool
    {
        if (! $amount) {
            return false;
        }

        $noise = new Imagick();
        $noise->newImage($this->getImageWidth(), $this->getImageHeight(), new ImagickPixel('#7C7C7C'));
        $noise->setImageFormat('png');
        $noise->addNoiseImage(imagick::NOISE_RANDOM);
        $noise->modulateImage(100, 0, 100);
        $noise->setImageOpacity($amount / 100);

        // Now lets overlay
        $this->compositeImage($noise, imagick::COMPOSITE_MULTIPLY, 0, 0);

        return true;
    }
}
