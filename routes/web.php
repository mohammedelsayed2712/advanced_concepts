<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class);
// Route::get('/users/{id}', HomeController::class)->where('id', '[0-9]+');
// Route::get('/users/{id}/{name}', HomeController::class)->whereNumber('id')->whereAlpha('name');
// Route::get('/users/{id}/{name}', HomeController::class)->whereAlphaNumeric('id')->whereAlpha('name');

Route::prefix('dashboard')->group(function () {

    // ==================================== dashboard main page
    // Route::view('/', 'dashboard')->name('dashboard')->middleware(['throttle:5,1']);
    // Route::view('/', 'dashboard')->name('dashboard')->middleware('TestMiddleware:mohwammed');
    Route::view('/', 'dashboard')->name('dashboard')->withoutMiddleware('auth');

    // ============================================= products
    // Route::resource('products', ProductController::class)->middleware(['throttle:watch']);

    // First way for slug

    // Route::get('products/show/{product:slug}', [ProductController::class, 'show'])->name('products.show');
    // Route::resource('products', ProductController::class)->except('show')->parameters([
    //     'products' => 'product:slug',
    // ]);

    // Second way for slug

    Route::get('products/show/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::resource('products', ProductController::class)->except('show');
});

// route fallback
Route::fallback(function () {
    // return 'This is page not found';
    // abort(404);
    // return redirect()->route('dashboard');
    return to_route('dashboard');
});

route::middleware(['throttle:3,1'])->group(function () {
    Route::get('/throttle', function () {
        return 'You have been throttled';
    });
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

// Second way
// require __DIR__.'/admin.php';
// require __DIR__.'/merchant.php';
