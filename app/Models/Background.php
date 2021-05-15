<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Imagick;
use ImagickPixel;

class Background extends Model
{
    use HasFactory;

    static $blendModes = [
        Imagick::COMPOSITE_DEFAULT => 'Default',
        Imagick::COMPOSITE_ADD => 'Add',
        Imagick::COMPOSITE_ATOP => 'Atop',
        Imagick::COMPOSITE_BLEND => 'Blend',
        Imagick::COMPOSITE_BUMPMAP => 'Bumpmap',
        Imagick::COMPOSITE_CLEAR => 'Clear',
        Imagick::COMPOSITE_COLORBURN => 'Color Burn',
        Imagick::COMPOSITE_COLORDODGE => 'Color Dodge',
        Imagick::COMPOSITE_COLORIZE => 'Colorize',
        Imagick::COMPOSITE_DARKEN => 'Darken',
        Imagick::COMPOSITE_DSTATOP => 'Dstatop',
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
        Imagick::COMPOSITE_IN => 'In',
        Imagick::COMPOSITE_LIGHTEN => 'Lighten',
        Imagick::COMPOSITE_LUMINIZE => 'Luminize',
        Imagick::COMPOSITE_MINUS => 'Minus',
        Imagick::COMPOSITE_MODULATE => 'Modulate',
        Imagick::COMPOSITE_MULTIPLY => 'Multiply',
        Imagick::COMPOSITE_OUT => 'Out',
        Imagick::COMPOSITE_OVERLAY => 'Overlay',
        Imagick::COMPOSITE_PLUS => 'Plus',
        Imagick::COMPOSITE_REPLACE => 'Replace',
        Imagick::COMPOSITE_SATURATE => 'Saturate',
        Imagick::COMPOSITE_SCREEN => 'Screen',
        Imagick::COMPOSITE_SOFTLIGHT => 'Softlight',
        Imagick::COMPOSITE_SRCATOP => 'Srcatop',
        Imagick::COMPOSITE_SRC => 'Src',
        Imagick::COMPOSITE_SRCIN => 'Srcin',
        Imagick::COMPOSITE_SRCOUT => 'Srcout',
        Imagick::COMPOSITE_SRCOVER => 'Srcover',
        Imagick::COMPOSITE_SUBTRACT => 'Subtract',
        Imagick::COMPOSITE_THRESHOLD => 'Threshold',
        Imagick::COMPOSITE_XOR => 'Xor',
    ];

    protected $attributes = [
        'pattern' => 'light_noise_diagonal',
        'blend' => Imagick::COMPOSITE_MULTIPLY,
        'invert' => false,
        '2x' => false,
        'intensity' => 10,
        'noise' => 0,
        'crop' => false,
    ];

    protected $fillable = [
        'color', 'pattern', 'blend', 'invert', '2x', 'intensity', 'noise'
    ];

    private Imagick $pattern;

    /**
     * @return array All available patterns.
     */
    public static function getPatterns(): array
    {
        $patterns = array();

        $path = storage_path('/patterns/');

        $pattern_files = glob($path . '*.png');
        foreach($pattern_files as $file){
            if(!substr_count(basename($file), '@2X')){
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
        if(!file_exists($this->getPatternFilename())) return [96, 96];

        $size = array_slice( getimagesize($this->getPatternFilename()), 0, 2);
        if($size[0] < 96) $size[0] = ceil(96 / $size[0]) * $size[0];
        if($size[1] < 96) $size[1] = ceil(96 / $size[1]) * $size[1];
    }

    /**
     * Get the pattern for this file.
     *
     * @return \Imagick
     * @throws \ImagickException
     */
    public function getPattern(): Imagick
    {
        $pattern = new Imagick();
        $pattern->readImage( $this->getPatternFilename() );

        if($this->attributes['crop']) {
            [$width, $height] = explode('x', $this->attributes['crop']);
            $pattern->cropImage( intval($width), intval($height), 0, 0 );
        }

        $pattern->setImageOpacity( $this->attributes['intensity'] / 100 );
        if($this->attributes['invert']) $pattern->negateImage( true );

        return $pattern;
    }

    /**
     * Get the Noise image for the loaded Pattern.
     *
     * @param \Imagick $image
     * @param int|null $amount
     * @return \Imagick|null
     */
    public function addNoise(Imagick $image, ?int $amount = null): ?Imagick
    {
        if(! $amount) return $image;

        $noise = new Imagick();
        $noise->newImage($image->getImageWidth(), $image->getImageHeight(), new ImagickPixel('#7C7C7C') );
        $noise->setImageFormat('png');
        $noise->addNoiseImage( imagick::NOISE_RANDOM );
        $noise->modulateImage(100,0,100);
        $noise->setImageOpacity( $amount/100 );

        // Now lets overlay
        $image->compositeImage( $noise, imagick::COMPOSITE_MULTIPLY, 0,0 );

        return $image;
    }

    /**
     * Gets an image blob for this Image model
     */
    public function getImage(): Imagick
    {
        $pattern = $this->getPattern();

        $bg = new Imagick();
        $bg->newImage(
            $pattern->getImageWidth(),
            $pattern->getImageHeight(),
            new ImagickPixel( $this->attributes['color'] )
        );
        $bg->setImageFormat('png');
        $bg->compositeImage( $pattern, (int) $this->attributes['blend'], 0,0 );

        // Add the noise
        $bg = $this->addNoise($bg, $this->attributes['noise']);

        return $bg;
    }
}
