<?php

use App\Http\Controllers\Api\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/image/', [ImageController::class, 'view']);
Route::get('/image/download/', [ImageController::class, 'download']);
