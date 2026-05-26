<?php

use App\Http\Controllers\admin\RegionController;
use App\Http\Controllers\admin\PackageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PlanTrekController;
use App\Models\Blog;
use App\Models\Package;
use App\Models\PlanTrek;
use App\Models\Region;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('admin.dashboard')->with(
        [
            'regionsCount' => Region::count(),
            'packagesCount' => Package::count(),
            'blogsCount' => Blog::count(),
            'planTrekCount' => PlanTrek::count(),
        ]
    );
})->name('dashboard');


Route::resource('regions', RegionController::class);
Route::resource('packages', PackageController::class);
Route::resource('users', UserController::class);

Route::resource('plan-treks', PlanTrekController::class);
