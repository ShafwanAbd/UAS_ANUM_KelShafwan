<?php

use App\Http\Controllers\CommonController;
use Illuminate\Support\Facades\Route; 

Route::get('/', [CommonController::class, 'main_index']);
Route::get('/main/input', [CommonController::class, 'mainInput']);
Route::post('/main/hasil/{berapaInput}/{cara}', [CommonController::class, 'mainInputHasil']); 
