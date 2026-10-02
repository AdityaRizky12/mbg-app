<?php

use App\Http\Controllers\SekolahController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DistribusiController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/distribusi');

Route::resource('sekolah', SekolahController::class)->except(['show']);
Route::resource('menu', MenuController::class)->except(['show']);
Route::resource('distribusi', DistribusiController::class)->except(['show']);