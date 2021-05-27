<?php

use App\Http\Controllers\SpaController;
use Illuminate\Support\Facades\Route;

Route::get('{path}', SpaController::class)->where('path', '(.*)');
