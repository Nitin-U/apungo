<?php

use App\Http\Controllers\Frontend\Blog\BlogController;
use App\Http\Controllers\Frontend\HomePageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomSignupController;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register backend routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/about', [HomePageController::class, 'about'])->name('about');
Route::get('/contact', [HomePageController::class, 'contact'])->name('contact');
Route::get('/service', [HomePageController::class, 'service'])->name('service');
Route::get('/list', [HomePageController::class, 'list'])->name('list');

Auth::routes([
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::any('/register', function() {
    abort(404);
});

//blogs
//Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
//Route::get('/blog/search/', [BlogController::class, 'search'])->name('blog.search');
//Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
//Route::get('/blog/category/{slug}', [BlogController::class, 'category'])->name('blog.category');

//custom register
Route::post('/signup', [CustomSignupController::class, 'signup'])->name('signup.store');
Route::get('/home', [BlogController::class, 'index'])->name('home.index');
Route::post('/search', [HomePageController::class, 'search'])->name('search');
Route::get('/check-vendor-availability', [HomePageController::class, 'searchVendor'])->name('search_vendor');

