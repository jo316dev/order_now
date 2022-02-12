<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    PlanController,
    PermissionController,
    ProfileController,
};



Route::prefix('admin')->group(function () {

    Route::any('plans/seach', [PlanController::class, 'search'])->name('plans.search');
    Route::resource('plans', PlanController::class);
});


Route::get('/', function () {
    return view('welcome');
});
