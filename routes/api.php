<?php

use App\Http\Controllers\Api\GenerateImageController;
use Illuminate\Support\Facades\Route;

Route::get('image', GenerateImageController::class);
