<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\User\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Page\HomePageController;
use App\Http\Controllers\Page\DetailPageController;

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

Route::get('/', [HomePageController::class, 'homeindex'])->name('homeindex');
Route::get('/searchtitle', [HomePageController::class, 'homeindex'])->name('searchtitle');
Route::get('/training', [HomePageController::class, 'training'])->name('training');
Route::get('/search', [HomePageController::class, 'training'])->name('search');
Route::get('/detail/{id}', [DetailPageController::class, 'detailtraining'])->name('detailtraining');

// Auth Start
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
// Auth Login
Route::fallback(function () {
    return redirect()->route('homeindex');
});


Route::middleware('auth:user')->group(function () {
    Route::post('/user/logout', [LogoutController::class, 'logout'])->name('user.logout');
    Route::get('/user', [DashboardController::class, 'dashboard'])->name('user.dashboard');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin', [DashboardAdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/formaddtopic', [DashboardAdminController::class, 'formadd'])->name('admin.formaddtopic');
    Route::get('/formupdatetopic/{id}', [DashboardAdminController::class, 'formupdate'])->name('admin.formupdatetopic');
    Route::get('/deletetopic/{id}', [DashboardAdminController::class, 'deletetopic'])->name('admin.deletetopic');
    Route::get('/detailtopic/{id}', [DashboardAdminController::class, 'detailtopic'])->name('admin.detailtopic');
    Route::post('/admin/logout', [LogoutController::class, 'logout'])->name('admin.logout');
    Route::post('/admin/posttopic', [DashboardAdminController::class, 'posttopic'])->name('admin.posttopic');
});
