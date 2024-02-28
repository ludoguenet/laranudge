<?php

use App\Http\Controllers\Admin\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)->name('index');
