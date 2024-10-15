<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

//Route::get('/', 'PublicController@index');
Route::get('/', [PublicController::class, 'index']);
