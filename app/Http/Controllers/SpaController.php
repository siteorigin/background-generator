<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Contracts\View\View;

class SpaController extends Controller
{
    public function __invoke(): View
    {
        return view('app', [
            'config' => $this->getConfig()
        ]);
    }

    protected function getConfig(): array
    {
        return [
            'patterns' => Image::getPatterns(),
            'blendModes' => Image::$blendModes
        ];
    }
}
