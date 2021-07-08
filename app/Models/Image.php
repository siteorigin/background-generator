<?php

namespace App\Models;

use \Imagick;
use App\Casts\HexColorCast;
use App\Image\CustomImagick;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ImagickPixel;

class Image extends Model
{
    use HasFactory;

    public static array $blendModes = [
        Imagick::COMPOSITE_DEFAULT => 'Default',
        Imagick::COMPOSITE_ATOP => 'Atop',
        Imagick::COMPOSITE_BLEND => 'Blend',
        Imagick::COMPOSITE_BUMPMAP => 'Bumpmap',
        Imagick::COMPOSITE_COLORBURN => 'Color Burn',
        Imagick::COMPOSITE_COLORDODGE => 'Color Dodge',
        Imagick::COMPOSITE_COLORIZE => 'Colorize',
        Imagick::COMPOSITE_DARKEN => 'Darken',
        Imagick::COMPOSITE_DST => 'Dst',
        Imagick::COMPOSITE_DSTIN => 'Dstin',
        Imagick::COMPOSITE_DSTOUT => 'Dstout',
        Imagick::COMPOSITE_DSTOVER => 'Dstover',
        Imagick::COMPOSITE_DIFFERENCE => 'Difference',
        Imagick::COMPOSITE_DISPLACE => 'Displace',
        Imagick::COMPOSITE_DISSOLVE => 'Dissolve',
        Imagick::COMPOSITE_EXCLUSION => 'Exclusion',
        Imagick::COMPOSITE_HARDLIGHT => 'Hardlight',
        Imagick::COMPOSITE_HUE => 'Hue',
        Imagick::COMPOSITE_LIGHTEN => 'Lighten',
        Imagick::COMPOSITE_LUMINIZE => 'Luminize',
        Imagick::COMPOSITE_MODULATE => 'Modulate',
        Imagick::COMPOSITE_MULTIPLY => 'Multiply',
        Imagick::COMPOSITE_OVERLAY => 'Overlay',
        Imagick::COMPOSITE_PLUS => 'Plus',
        Imagick::COMPOSITE_SATURATE => 'Saturate',
        Imagick::COMPOSITE_SCREEN => 'Screen',
        Imagick::COMPOSITE_SOFTLIGHT => 'Softlight',
        Imagick::COMPOSITE_SRCATOP => 'Srcatop',
        Imagick::COMPOSITE_SRCOVER => 'Srcover',
        Imagick::COMPOSITE_THRESHOLD => 'Threshold',
        Imagick::COMPOSITE_XOR => 'Xor',
    ];

    protected $attributes = [
        'color' => '#333333',
        'pattern' => 'light_noise_diagonal',
        'blend' => Imagick::COMPOSITE_MULTIPLY,
        'invert' => false,
        '2x' => false,
        'intensity' => 10,
        'noise' => 0,
        'crop' => false,
    ];

    protected $casts = [
        'color' => HexColorCast::class,
        'invert' => 'boolean',
        '2x' => 'boolean',
    ];

    protected $fillable = [
        'color', 'pattern', 'blend', 'invert', '2x', 'intensity', 'noise',
    ];

    /**
     * @return array All available patterns.
     */
    public static function getPatterns(): array
    {
        $patterns = [];

        $path = storage_path('/patterns/');

        $pattern_files = glob($path . '*.png');
        foreach ($pattern_files as $file) {
            if (! substr_count(basename($file), '@2X')) {
                $p = pathinfo($file);
                $patterns[] = $p['filename'];
            }
        }
        sort($patterns);

        return $patterns;
    }

    /**
     * @return string The full path of the pattern file.
     */
    public function getPatternFilename(): string
    {
        return storage_path(
            '/patterns/' .
            $this->attributes['pattern'] .
            ($this->attributes['2x'] ? '_@2X' : '') .
            '.png'
        );
    }

    /**
     * Get the size of the current pattern
     */
    public function getPatternSize(): array
    {
        if (! file_exists($this->getPatternFilename())) {
            return [96, 96];
        }

        $size = array_slice(getimagesize($this->getPatternFilename()), 0, 2);
        if ($size[0] < 96) {
            $size[0] = ceil(96 / $size[0]) * $size[0];
        }
        if ($size[1] < 96) {
            $size[1] = ceil(96 / $size[1]) * $size[1];
        }
    }

    /**
     * Get the pattern for this file.
     *
     * @throws \ImagickException
     */
    public function getPattern(): CustomImagick
    {
        $pattern = new CustomImagick();
        $pattern->readImage($this->getPatternFilename());

        if ($this->attributes['crop']) {
            [$width, $height] = explode('x', $this->attributes['crop']);
            $pattern->cropImage(intval($width), intval($height), 0, 0);
        }

        $pattern->setImageAlpha($this->attributes['intensity'] / 100);
        if ($this->attributes['invert']) {
            $pattern->negateImage(true);
        }

        return $pattern;
    }

    /**
     * Gets an image blob for this Image model
     *
     * @throws \ImagickException
     * @throws \ImagickPixelException
     */
    public function getImage(): CustomImagick
    {
        $pattern = $this->getPattern();

        $bg = new CustomImagick();
        $bg->newImage(
            $pattern->getImageWidth(),
            $pattern->getImageHeight(),
            new ImagickPixel($this->attributes['color'])
        );
        $bg->setImageFormat('png');
        $bg->compositeImage($pattern, (int) $this->attributes['blend'], 0, 0);
        $bg->overlayNoise($this->attributes['noise']);

        return $bg;
    }
}
