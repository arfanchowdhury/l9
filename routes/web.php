<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// landing pages route

Route::get('/', [LandingPageController::class, 'index'])->name('index');

Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::get('/shop/details/{product}', [ShopController::class, 'item'])->name('shop.item');


Route::get('/cart/index', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// auth pages route

Route::middleware('guest')->group(function () {

    Route::get('/auth/register', [Auth\RegisteredUserController::class, 'create'])->name('auth.register');
    Route::post('/auth/register', [Auth\RegisteredUserController::class, 'store'])->name('auth.register.store');

    Route::get('/auth/login', [Auth\AuthenticatedSessionController::class, 'create'])->name('auth.login');
    Route::post('/auth/login', [Auth\AuthenticatedSessionController::class, 'store'])->name('auth.login.store');
   
});

Route::middleware('auth')->group(function () {

    Route::get('/auth/profile', [Auth\ProfileController::class, 'edit'])->name('auth.profile');
    Route::post('/auth/profile/{user}', [Auth\ProfileController::class, 'update'])->name('auth.profile.update');
    Route::get('/auth/change-password', [Auth\ChangePasswordController::class, 'edit'])->name('auth.change.password');
    Route::post('/auth/update-password', [Auth\ChangePasswordController::class, 'update'])->name('auth.update.password');
    Route::post('/auth/logout', [Auth\AuthenticatedSessionController::class, 'destroy'])->name('auth.logout');

    // user route
    Route::get('/home', [UserController::class, 'index'])->name('user.dashboard');

    // admin page route 
    
    Route::middleware('isAdmin')->group(function () {
        
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
            
        Route::resource('roles', RoleController::class);
        Route::resource('slides', SlideController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
    
    });

});




Route::get('/welcome', function () {
    // dd(auth()->user()->roles()->pluck('slug')[0]);
    return view('welcome');
});






