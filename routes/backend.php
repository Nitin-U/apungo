<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\News\BlogCategoryController;
use App\Http\Controllers\Backend\News\BlogController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\GeneralSetup\UserController;
use App\Http\Controllers\Backend\User\UserProfileController;
use App\Http\Controllers\Backend\Vendor\VendorController;
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

Route::get('/', function () {
    return redirect()->route('backend.login');
});

Auth::routes([
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::any('/register', function() {
    abort(404);
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
//Route::post('/setting/theme-mode',  [DashboardController::class, 'themeMode'])->name('setting.theme-mode');
//
//Route::prefix('user/')->name('user.')->middleware(['auth'])->group(function () {
//    //signed-in user routes
//    Route::get('profile', [UserProfileController::class, 'index'])->name('profile');
//    Route::get('profile/{slug?}', [UserProfileController::class, 'profile'])->name('profile');
//    Route::get('profile/edit/{slug}', [UserProfileController::class, 'profileEdit'])->name('profile.edit');
//    Route::post('profile/socials/', [UserProfileController::class, 'socialsUpdate'])->name('profile.socials');
//    Route::put('profile/{id}/update', [UserProfileController::class, 'profileUpdate'])->name('profile.update');
//    Route::post('user-image/update/', [UserProfileController::class, 'imageupdate'])->name('imageupdate');
//    Route::post('profile/oldpassword', [UserProfileController::class, 'checkoldpassword'])->name('oldpassword');
//    Route::post('profile/password', [UserProfileController::class, 'profilepassword'])->name('password');
//    Route::post('user/removeaccount', [UserProfileController::class, 'removeAccount'])->name('removeaccount');
//    //end of signed-in user routes
//
//    //user related routes
//    Route::get('filemanager', [UserController::class, 'filemanager'])->name('filemanager');
//    Route::post('/user-management/status-update', [UserController::class,'statusUpdate'])->name('user-management.status-update');
//    Route::post('/user-management/data', [UserController::class,'getDataForDataTable'])->name('user-management.data');
//    Route::get('/user-management/trash', [UserController::class,'trash'])->name('user-management.trash');
//    Route::post('/user-management/trash/{id}/restore', [UserController::class,'restore'])->name('user-management.restore');
//    Route::delete('/user-management/trash/{id}/remove', [UserController::class,'removeTrash'])->name('user-management.remove-trash');
//    Route::resource('user-management', UserController::class)->names('user-management');
//
//});
//
//Route::prefix('news/')->name('news.')->middleware(['auth'])->group(function () {
//
//    Route::prefix('basic-setup/')->name('basic_setup.')->middleware(['auth'])->group(function () {
//        //category
//        Route::get('/category/trash', [BlogCategoryController::class,'trash'])->name('category.trash');
//        Route::post('/category/trash/{id}/restore', [BlogCategoryController::class,'restore'])->name('category.restore');
//        Route::delete('/category/trash/{id}/remove', [BlogCategoryController::class,'removeTrash'])->name('category.remove-trash');
//        Route::resource('category', BlogCategoryController::class)->names('category');
//    });
//
//    //blog
//    Route::get('/blog/trash', [BlogController::class,'trash'])->name('blog.trash');
//    Route::post('/blog/trash/{id}/restore', [BlogController::class,'restore'])->name('blog.restore');
//    Route::delete('/blog/trash/{id}/remove', [BlogController::class,'removeTrash'])->name('blog.remove-trash');
//    Route::resource('blog', BlogController::class)->names('blog');
//});
//
//
////for menu
//Route::get('/add-page-to-menu',[MenuController::class,'addPage'])->name('menu.page');
//Route::get('/add-service-to-menu',[MenuController::class,'addService'])->name('menu.service');
//Route::get('add-blog-to-menu',[MenuController::class,'addBlog'])->name('menu.blog');
//Route::get('add-custom-link',[MenuController::class,'addCustomLink'])->name('menu.custom');
//Route::get('/update-menu',[MenuController::class,'updateMenu'])->name('menu.updateMenu');
//Route::post('/update-menuitem/{id}',[MenuController::class,'updateMenuItem'])->name('menu.update_menu_item');
//Route::get('/delete-menuitem/{id}/{key}/{in?}/{inside?}',[MenuController::class,'deleteMenuItem'])->name('menu.delete_menu_item');
//Route::post('menu', [MenuController::class,'store'])->name('menu.store');
//Route::get('/menu/{slug?}', [MenuController::class,'index'])->name('menu.index');
//Route::get('/menu/{id}/delete',[MenuController::class,'destroy'])->name('menu.delete');
//Route::resource('menu', MenuController::class)->names('menu');
//
//Route::resource('setting', SettingController::class)->names('setting')->middleware(['auth']);

Route::prefix('general-setup/')->name('general_setup.')->middleware(['auth'])->group(function () {

    //user related routes
    Route::post('/user-management/status-update', [UserController::class,'statusUpdate'])->name('user_management.status-update')->middleware(['isAdmin']);
    Route::post('/user-management/data', [UserController::class,'getDataForDataTable'])->name('user_management.data')->middleware(['isAdmin']);
    Route::get('/user-management/trash', [UserController::class,'trash'])->name('user_management.trash')->middleware(['isAdmin']);
    Route::post('/user-management/trash/{id}/restore', [UserController::class,'restore'])->name('user_management.restore')->middleware(['isAdmin']);
    Route::delete('/user-management/trash/{id}/remove', [UserController::class,'removeTrash'])->name('user_management.remove-trash')->middleware(['isAdmin']);
    Route::resource('user-management', UserController::class)->names('user_management')->middleware(['isAdmin']);

     // vendor related routes
    Route::post('/vendor-management/status-update', [VendorController::class,'statusUpdate'])
        ->name('vendor_management.status-update')
        ->middleware(['isAdmin']);

    Route::post('/vendor-management/data', [VendorController::class,'getDataForDataTable'])
        ->name('vendor_management.data')
        ->middleware(['isAdmin']);

    Route::get('/vendor-management/trash', [VendorController::class,'trash'])
        ->name('vendor_management.trash')
        ->middleware(['isAdmin']);

    Route::post('/vendor-management/trash/{id}/restore', [VendorController::class,'restore'])
        ->name('vendor_management.restore')
        ->middleware(['isAdmin']);

    Route::delete('/vendor-management/trash/{id}/remove', [VendorController::class,'removeTrash'])
        ->name('vendor_management.remove-trash')
        ->middleware(['isAdmin']);

    Route::resource('vendor-management', VendorController::class)
        ->names('vendor_management')
        ->middleware(['isAdmin']);
});
