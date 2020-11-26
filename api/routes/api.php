<?php

use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\SignOutController;
use App\Http\Controllers\Auth\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'auth'], function(){
    Route::post('signin', SignInController::class);
    Route::post('signout', SignOutController::class);

    Route::get('user', UserController::class);
});