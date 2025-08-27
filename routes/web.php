<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('about', [HomeController::class, 'about']);

// Admin Panel
Route::get('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);
Route::post('login_admin', [AuthController::class, 'login_admin']);
Route::get('forget', [AuthController::class, 'forget']);
Route::post('forget_admin', [AuthController::class, 'forget_admin']);

Route::group(['middleware'=> 'admin'], function(){

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('admin/home', [DashboardController::class, 'admin_home']);
    Route::post('admin/home/post', [DashboardController::class, 'admin_home_post']);

    Route::get('admin/about', [DashboardController::class, 'admin_about']);
    Route::post('admin/about/post', [DashboardController::class, 'admin_about_post']);

    Route::get('admin/portfolio', [DashboardController::class, 'admin_portfolio']);
    Route::get('admin/contact', [DashboardController::class, 'admin_contact']);
    Route::get('admin/blog', [DashboardController::class, 'admin_blog']);

});

