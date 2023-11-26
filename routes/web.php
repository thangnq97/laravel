<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BillsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\SizesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VouchersController;
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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/register', [HomeController::class, 'postRegister']);
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login', [HomeController::class, 'postLogin']);
Route::get('/logout', [HomeController::class, 'logOut'])->name('logout');
Route::get('/active/{user}/{token}', [HomeController::class, 'active'])->name('user.active');
Route::get('/forgotPassword', [HomeController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/forgotPassword', [HomeController::class, 'postForgotPassword']);
Route::get('re-password/{user}/{token}', [HomeController::class, 'rePassword'])->name('user.repassword');
Route::post('re-password', [HomeController::class, 'postRePassword'])->name('postRePassword');

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'saveLogin']);
Route::get('/admin/sign-out', [AdminController::class, 'signOut'])->name('admin.signout');

Route::prefix('admin')->middleware('admin')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('/variant', ProductVariantController::class);
    Route::resource('/category', CategoriesController::class);
    Route::resource('/color', ColorsController::class);
    Route::resource('/size', SizesController::class);
    Route::resource('/voucher', VouchersController::class);
    Route::resource('/product', ProductsController::class);
    Route::get('/comment', [CommentsController::class, 'index'])->name('comment.index');
    Route::delete('/comment/{comment}', [CommentsController::class, 'destroy'])->name('comment.destroy');
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/bill', [BillsController::class, 'index'])->name('bill.index');
    Route::get('/bill/{bill}', [BillsController::class, 'show'])->name('bill.show');
    Route::put('/bill/{bill}', [BillsController::class, 'update'])->name('bill.update');
    Route::get('/back', [BillsController::class, 'back'])->name('bill.back');
});
