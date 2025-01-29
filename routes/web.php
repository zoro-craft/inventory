<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    if (!session('authentication')) {
        return redirect()->route('auth.login')->with([
            'access_denied' => 'Vous devez être connecté pour accéder à cette page.',
        ]);
    }
    return view('welcome');
})->name('home');

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
// Route::resource('auth', AuthController::class);
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/store', [AuthController::class, 'store'])->name('auth.store');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/verifyLogin', [AuthController::class, 'verifyLogin'])->name('auth.verifyLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
