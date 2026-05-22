<?php

use App\Http\Controllers\admin\RegionController;
use App\Models\Blog;
use App\Models\Package;
use App\Models\Region;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('admin.dashboard')->with(
        [
            'regionsCount' => Region::count(),
            'packagesCount' => Package::count(),
            'blogsCount' => Blog::count(),
        ]
    );
})->name('dashboard');


Route::resource('regions', RegionController::class);
