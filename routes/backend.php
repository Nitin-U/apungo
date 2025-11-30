<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GeneralSetup\ServiceController;
use App\Http\Controllers\Backend\GeneralSetup\VendorController;
use App\Http\Controllers\Backend\GeneralSetup\VendorPendingController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//defines the whole laravel route system
Auth::routes([
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::any('/register', function() {
    abort(404);
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::prefix('general-setup/')->name('general_setup.')->middleware(['auth'])->group(function () {
     //vendor related routes
    Route::post('/vendor-management/status-update', [VendorController::class,'statusUpdate'])->name('vendor_management.status-update')->middleware(['isAdmin']);
    Route::post('/vendor-management/data', [VendorController::class,'getDataForDataTable'])->name('vendor_management.data')->middleware(['isAdmin']);
    Route::get('/vendor-management/trash', [VendorController::class,'trash'])->name('vendor_management.trash')->middleware(['isAdmin']);
    Route::post('/vendor-management/trash/{id}/restore', [VendorController::class,'restore'])->name('vendor_management.restore')->middleware(['isAdmin']);
    Route::delete('/vendor-management/trash/{id}/remove', [VendorController::class,'removeTrash'])->name('vendor_management.remove-trash')->middleware(['isAdmin']);
    Route::resource('vendor-management', VendorController::class)->names('vendor_management')->middleware(['isAdmin']);

    //service related routes
    Route::post('/service-management/status-update', [ServiceController::class,'statusUpdate'])->name('service_management.status-update')->middleware(['isAdmin']);
    Route::post('/service-management/data', [ServiceController::class,'getDataForDataTable'])->name('service_management.data')->middleware(['isAdmin']);
    Route::get('/service-management/trash', [ServiceController::class,'trash'])->name('service_management.trash')->middleware(['isAdmin']);
    Route::post('/service-management/trash/{id}/restore', [ServiceController::class,'restore'])->name('service_management.restore')->middleware(['isAdmin']);
    Route::delete('/service-management/trash/{id}/remove', [ServiceController::class,'removeTrash'])->name('service_management.remove-trash')->middleware(['isAdmin']);
    Route::resource('service-management', ServiceController::class)->names('service_management')->middleware(['isAdmin']);

    //vendor pending related routes
    Route::resource('vendor-pending', VendorPendingController::class)->names('vendor_pending')->middleware(['isAdmin']);
    Route::post('/vendor-pending/status-update', [VendorPendingController::class,'statusUpdate'])->name('vendor_pending.status-update')->middleware(['isAdmin']);
    Route::post('/vendor-pending/data', [VendorPendingController::class,'getDataForDataTable'])->name('vendor_pending.data')->middleware(['isAdmin']);
    Route::get('/vendor-pending/trash', [VendorPendingController::class,'trash'])->name('vendor_pending.trash')->middleware(['isAdmin']);
    Route::post('/vendor-pending/trash/{id}/restore', [VendorPendingController::class,'restore'])->name('vendor_pending.restore')->middleware(['isAdmin']);
    Route::delete('/vendor-pending/trash/{id}/remove', [VendorPendingController::class,'removeTrash'])->name('vendor_pending.remove-trash')->middleware(['isAdmin']);
});

//user related routes
Route::post('/user-management/status-update', [UserController::class,'statusUpdate'])->name('user_management.status-update')->middleware(['isAdmin']);
Route::post('/user-management/data', [UserController::class,'getDataForDataTable'])->name('user_management.data')->middleware(['isAdmin']);
Route::get('/user-management/trash', [UserController::class,'trash'])->name('user_management.trash')->middleware(['isAdmin']);
Route::post('/user-management/trash/{id}/restore', [UserController::class,'restore'])->name('user_management.restore')->middleware(['isAdmin']);
Route::delete('/user-management/trash/{id}/remove', [UserController::class,'removeTrash'])->name('user_management.remove-trash')->middleware(['isAdmin']);
Route::resource('user-management', UserController::class)->names('user_management')->middleware(['isAdmin']);
