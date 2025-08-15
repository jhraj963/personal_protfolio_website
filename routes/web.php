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
Route::get('forget', [AuthController::class, 'forget']);
Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
Route::get('admin/home', [DashboardController::class, 'admin_home']);
Route::get('admin/about', [DashboardController::class, 'admin_about']);
Route::get('admin/portfolio', [DashboardController::class, 'admin_portfolio']);
Route::get('admin/contact', [DashboardController::class, 'admin_contact']);
Route::get('admin/blog', [DashboardController::class, 'admin_blog']);
