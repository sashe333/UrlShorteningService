<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

Route::get('/', [ UrlController::class, 'index' ])->name('url');

Route::post('/store', [ UrlController::class, 'store' ])->name('url.store');

Route::get('/{hash}', [ UrlController::class, 'redirect' ])->name('redirect');
