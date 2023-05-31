<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(\App\Http\Controllers\Tpk\AuthController::class)->group(function () {

    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::get('/success', 'register_success')->name('register_success');
	Route::get('/lupa-password', 'forgot_password');
    Route::get('/password-reset', 'reset_password');
});
Route::middleware(['auth' => 'tpk'])->group(function () {
	
Route::prefix('/tpk')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Tpk\DashboardController::class, 'index']);

    //catin
    Route::controller(\App\Http\Controllers\Tpk\CatinController::class)->group(function () {
        Route::get('/catin', 'index');
        Route::post('/catin/store', 'store');
    });
});



Route::get('/signout', function () {
    setcookie("access_tokenku", 'null');
    return redirect(url('/'));
});

});

Route::get('/set_cookie', function () {
    $token = request('token');
    setcookie("access_tokenku", $token, time() + 86400);
    return redirect('/tpk/dashboard');
});