<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\admin\AdminHomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminHomeController::class, 'index'])->name('admin.home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/home/slide', 'HomeSlider')->name('home.slide');
   Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
});

 // About Page All Route
 Route::controller(AboutController::class)->group(function () {
    Route::get('/about/page', 'AboutPage')->name('about.page');
    Route::post('/update/about', 'UpdateAbout')->name('update.about');
    Route::get('/about', 'HomeAbout')->name('home.about');

    Route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image');
    Route::post('/store/multi/image', 'StoreMultiImage')->name('store.multi.image');

    Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');
    Route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');

    // ✅ تصحيح المسار ليشمل {id}
    Route::post('/update/multi/image/{id}', 'UpdateMultiImage')->name('update.multi.image');

    Route::get('/delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');
});