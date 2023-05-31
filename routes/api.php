<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthTpkController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


	
//Auth User Tpk
Route::controller(AuthTpkController::class)->group(function () {
	Route::post('/tpk/signin', 'signin')->name('signin');
	 
	Route::post('/tpk/forgot-password', 'forgot_password');
	Route::post('/tpk/reset-password', 'reset_password');
});

//Auth User Administrator
Route::controller(AuthAdministratorController::class)->group(function () {
	Route::post('/signin', 'signin')->name('signin');
});

Route::group(['middleware' => 'auth:sanctum',], function () {
Route::get('/user', [AuthTpkController::class, 'User']);
//BUMIL
Route::get('/bumil/list', [Response\Bumil::class, 'index']);
Route::get('/bumil/view_id', [Response\Bumil::class, 'view_id']);
Route::get('/bumil/view_kode', [Response\Bumil::class, 'view_kode']);
Route::post('/bumil/create', [Response\Bumil::class, 'create']);
Route::post('/bumil/update', [Response\Bumil::class, 'update']);
Route::delete('/bumil/delete', [Response\Bumil::class, 'delete']);

Route::post('/tpk/signout', [AuthTpkController::class, 'destroy']);

});
