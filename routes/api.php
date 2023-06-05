<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Response;
use App\Http\Controllers\Auth\AuthTpkController;
use App\Http\Controllers\Auth\AuthAdministratorController;
use Illuminate\Support\Facades\Auth;

	
//Auth User Tpk
Route::controller(AuthTpkController::class)->group(function () {
	Route::post('/tpk/signin', 'signin')->name('signin2');
	 
	Route::post('/tpk/forgot-password', 'forgot_password');
	Route::post('/tpk/reset-password', 'reset_password');
});

//Auth User Administrator
Route::group(['prefix' => 'auth'], function () {
Route::controller(AuthAdministratorController::class)->group(function () {
	Route::post('/signin', 'login')->name('signin');
});
});


//AUTH MIDDLEWARE SANCTUM
Route::group(['middleware' => 'auth:sanctum',], function () {
	Route::get('/user', [AuthTpkController::class, 'User']);

	Route::group(['middleware' => ['auth:sanctum','role:tpk']], function() {
		
	   //API TPK BUMIL
		Route::get('/bumil/list', [Response\Bumil::class, 'index']);
		Route::get('/bumil/view_id', [Response\Bumil::class, 'view_id']);
		Route::get('/bumil/view_kode', [Response\Bumil::class, 'view_kode']);
		Route::post('/bumil/create', [Response\Bumil::class, 'create']);
		Route::post('/bumil/update', [Response\Bumil::class, 'update']);
		Route::delete('/bumil/delete', [Response\Bumil::class, 'delete']);
		
		
		
		
		
		
		
		//UPLOAD ROUTE API DISINI !!
		
		
		
		
		
		
		
		Route::post('/tpk/signout', [AuthTpkController::class, 'destroy']);
	});

	//API ADMIN
	Route::prefix('/v1')->group(function () {
		Route::get('/meta/filter', [Response\Admin\Meta::class, 'filter']);
		Route::get('/meta/report', [Response\Admin\Meta::class, 'report']);
		Route::get('/meta/wilayah_list', [Response\Admin\Meta::class, 'wilayah_list']);
		
		Route::get('/setting/get', [Response\Admin\Setting::class, 'index']);
		Route::post('/setting/update', [Response\Admin\Setting::class, 'update']);
		
		Route::prefix('/administrator')->group(function () {
			Route::get('/account', [Response\Admin\Users::class, 'index']);
			Route::post('/account_update', [Response\Admin\Users::class, 'account_update']);
		});
		
		//API BUMIL
		Route::prefix('/bumil')->group(function () {
			Route::post('/list', [Response\Admin\DataBumil::class, 'index']);
			Route::get('/view_id/{id}', [Response\Admin\DataBumil::class, 'view_id']);
			Route::post('/view_kode/{id}', [Response\Admin\DataBumil::class, 'view_kode']);
			Route::get('/report', [Response\Admin\DataBumil::class, 'report']);

		});
		
		//API CATIN
		Route::prefix('/catin')->group(function () {
			Route::post('/list', [Response\Admin\DataCatin::class, 'index']);
			Route::get('/view_id/{id}', [Response\Admin\DataCatin::class, 'view_id']);
			Route::post('/view_kode/{id}', [Response\Admin\DataCatin::class, 'view_kode']);
			Route::get('/report', [Response\Admin\DataCatin::class, 'report']);

		});
		
		//API PASCA PERSALINAN
		Route::prefix('/pasca_persalinan')->group(function () {
			Route::post('/list', [Response\Admin\DataPascaPersalinan::class, 'index']);
			Route::get('/view_id/{id}', [Response\Admin\DataPascaPersalinan::class, 'view_id']);
			Route::post('/view_kode/{id}', [Response\Admin\DataPascaPersalinan::class, 'view_kode']);
			Route::get('/report', [Response\Admin\DataPascaPersalinan::class, 'report']);

		});
		
		//API BADUTA
		Route::prefix('/baduta')->group(function () {
			Route::post('/list', [Response\Admin\DataBaduta::class, 'index']);
			Route::get('/view_id/{id}', [Response\Admin\DataBaduta::class, 'view_id']);
			Route::post('/view_kode/{id}', [Response\Admin\DataBaduta::class, 'view_kode']);
			Route::get('/report', [Response\Admin\DataBaduta::class, 'report']);

		});
		
		//API PETUGAS TPK
		Route::prefix('/user_tpk')->group(function () {
			Route::post('/list', [Response\Admin\DataTpk::class, 'index']);
			Route::get('/view_id/{id}', [Response\Admin\DataTpk::class, 'view_id']);
			Route::post('/create', [Response\Admin\DataTpk::class, 'create']);
			Route::post('/update/{id}', [Response\Admin\DataTpk::class, 'update']);
			Route::delete('/delete/{id}', [Response\Admin\DataTpk::class, 'delete']);

		});
	});

});
