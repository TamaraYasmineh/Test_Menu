<?php

use \App\Http\Controllers\Admin\CategoryController;
use \App\Http\Controllers\Admin\MenuItemController;
use \App\Http\Controllers\Admin\RestaurantController;
use \App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\QrCodeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $restaurant = \App\Models\Restaurant::where('is_active', true)->first();

    if (! $restaurant) {
        abort(404);
    }

    return redirect()->route('menu.show', $restaurant);
});

Route::get('/r/{restaurant}', [MenuController::class, 'index'])
    ->name('menu.show');


// Authentication
Route::get('/login', [LoginController::class, 'create'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [LoginController::class, 'store'])
    ->name('login.attempt')
    ->middleware('guest');

Route::post('/logout', [LoginController::class, 'destroy'])
    ->name('logout')
    ->middleware('auth');



// Admin (protected)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('restaurants', RestaurantController::class)
        ->except(['show']);

    Route::get('/restaurants/{restaurant}/qr-code', [QrCodeController::class, 'show'])
        ->name('restaurants.qr-code');

    Route::get('/restaurants/{restaurant}/qr-code/image', [QrCodeController::class, 'image'])
        ->name('restaurants.qr-code.image');

    Route::resource('categories', CategoryController::class)
        ->except(['show']);
    Route::resource('menu-items', MenuItemController::class)
        ->except(['show']);

    Route::get('/settings', [SettingsController::class, 'edit'])
        ->name('settings.edit');

    Route::put('/settings', [SettingsController::class, 'update'])
        ->name('settings.update');
});
