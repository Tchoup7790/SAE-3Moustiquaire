<?php

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

/*
 * Main route
 */
Route::get('/', function() {
    return view('index');
})->name('index');

/*
 * Product routes
 */
Route::prefix('product')->name('product.')->controller(\App\Http\Controllers\ProductController::class)->group(function() {
   Route::get('', 'index')->name('cat');
   Route::get('show', 'show')->name('show');

   // Product managing routes
   Route::middleware("auth.admin")->group(function() {
    Route::get('modify', 'modify')->name('modify');
        Route::patch('modify', 'update')->name('update');
        Route::get('create', 'create')->name('create');
        Route::post('create', 'add')->name('add');
        Route::delete('delete', 'delete')->name('delete');
    });
});

/*
 * User routes
 */
Route::prefix('user')->name('user.')->controller(\App\Http\Controllers\UserController::class)->middleware('auth')->group(function() {
    Route::get('', 'index')->name('index');
    Route::prefix('cart')->name('cart.')->group(function() {
        Route::get('', 'cart')->name('index');
        Route::patch('update', 'updateCart')->name('update');
        Route::delete('delete', 'deleteFromCart')->name('delete');
    });
});

/*
 * Order routes
 */
Route::prefix('order')->name('order.')->controller(\App\Http\Controllers\OrderController::class)->middleware('auth')->group(function() {
    Route::get('', 'index')->name('index');
    Route::post('', 'proceed')->name('proceed');
    Route::patch('address', 'setAddress')->name('address');
    Route::patch('payment', 'setPayment')->name('payment');
});

/*
 * Auth routes
 */
Route::prefix('')->name('auth.')->controller(\App\Http\Controllers\AuthController::class)->group(function() {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'authenticate')->name('login');
    Route::get('register', 'register')->name('register');
    Route::post('register', 'createUser')->name('createUser');

    // Routes that use middleware "auth"
    Route::middleware('auth')->group(function() {
        Route::delete('logout', 'logout')->name('logout');
        Route::get('edit', 'edit')->name('edit');
        Route::patch('edit', 'update')->name('update');
        Route::delete('disableAccount', 'disable')->name('disable');
    });

    // Password recovery routes
    Route::middleware('guest')->group(function () {
        Route::get('forgot-password', 'form')->name('form');
        Route::post('forgot-password', 'sendLink')->name('sendlink');
        Route::get('reset-password', 'resetForm')->name('resetform');
        Route::patch('reset-password', 'reset')->name('reset');
    });
});

/*
 * Help routes
 */
Route::prefix('help')->name('help.')->controller(\App\Http\Controllers\HelpController::class)->group(function() {
    Route::get('', 'index')->name('index');
    Route::get('contact', 'contact')->name('contact');
    Route::get('legal', 'legal')->name('legal');
    Route::get('about', 'about')->name('about');
});

/*
 * Admin routes
 */
Route::prefix('admin')->name('admin.')->middleware('auth.admin')->controller(\App\Http\Controllers\AdminController::class)->group(function() {
    Route::get('', 'index')->name('index');
});
