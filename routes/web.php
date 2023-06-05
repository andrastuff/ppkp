<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;
 
// LANDING PAGE
Route::get('/', [\App\Http\Controllers\Landing\LandingController::class, 'index']);

// LOGIN ADMINISTRATOR
Route::controller(\App\Http\Controllers\Admin\AuthController::class)->group(function () {
    Route::get('/root', 'login')->name('login');  
});

 
// LOGIN USER TPK
Route::controller(\App\Http\Controllers\Tpk\AuthController::class)->group(function () {

    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::get('/success', 'register_success')->name('register_success');
	Route::get('/lupa-password', 'forgot_password');
    Route::get('/password-reset', 'reset_password');
});


//HALAMAN PETUGAS TPK
Route::middleware(['auth' => 'tpk'])->group(function () {
	
	Route::prefix('/tpk')->group(function () {
		Route::get('/dashboard', [\App\Http\Controllers\Tpk\DashboardController::class, 'index']);

		//CATIN
		Route::controller(\App\Http\Controllers\Tpk\CatinController::class)->group(function () {
			Route::get('/catin', 'index');
			Route::post('/catin/store', 'store');
		});
	





		// UPLOAD ROUTE TPK DISINI!!
		
		
		
		
		
		
		
		
		
		
	});	

	Route::get('/signout', function () {
		setcookie("access_tokenku", 'null');
		return redirect(url('/'));
	});

});


//HALAMAN ADMINISTRATOR
Route::group(['middleware' => 'auth:sanctum'], function () {
	Route::post('logout', [\App\Http\Controllers\Auth\AuthAdministratorController::class, 'destroy'])->name('logout');
	
	Route::prefix('/administrator')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('/setting', [\App\Http\Controllers\Admin\DashboardController::class, 'setting']);
    Route::get('/setting/account', [\App\Http\Controllers\Admin\DashboardController::class, 'account']);
	
	Route::prefix('/data_catin')->group(function () {
		Route::get('/', [\App\Http\Controllers\Admin\CatinController::class, 'index']);
		Route::get('/open/{id}', [\App\Http\Controllers\Admin\CatinController::class, 'open']);
		Route::get('/kode_catin/{id}', [\App\Http\Controllers\Admin\CatinController::class, 'riwayat']);
		Route::get('/grafik', [\App\Http\Controllers\Admin\CatinController::class, 'grafik']);
	});
	
	Route::prefix('/data_bumil')->group(function () {
		Route::get('/', [\App\Http\Controllers\Admin\BumilController::class, 'index']);
		Route::get('/open/{id}', [\App\Http\Controllers\Admin\BumilController::class, 'open']);
		Route::get('/kode_bumil/{id}', [\App\Http\Controllers\Admin\BumilController::class, 'riwayat']);
		Route::get('/grafik', [\App\Http\Controllers\Admin\BumilController::class, 'grafik']);
	});
	
	Route::prefix('/data_pasca_persalinan')->group(function () {
		Route::get('/', [\App\Http\Controllers\Admin\PascaPersalinanController::class, 'index']);
		Route::get('/open/{id}', [\App\Http\Controllers\Admin\PascaPersalinanController::class, 'open']);
		Route::get('/kode_pasca_persalinan/{id}', [\App\Http\Controllers\Admin\PascaPersalinanController::class, 'riwayat']);
		Route::get('/grafik', [\App\Http\Controllers\Admin\PascaPersalinanController::class, 'grafik']);
	});
	
	Route::prefix('/data_baduta')->group(function () {
		Route::get('/', [\App\Http\Controllers\Admin\BadutaController::class, 'index']);
		Route::get('/open/{id}', [\App\Http\Controllers\Admin\BadutaController::class, 'open']);
		Route::get('/kode_baduta/{id}', [\App\Http\Controllers\Admin\BadutaController::class, 'riwayat']);
		Route::get('/grafik', [\App\Http\Controllers\Admin\BadutaController::class, 'grafik']);
	});
	
	Route::prefix('/data_tpk')->group(function () {
		Route::get('/', [\App\Http\Controllers\Admin\UserTpkController::class, 'index']);
		Route::get('/open/{id}', [\App\Http\Controllers\Admin\UserTpkController::class, 'open']);
		Route::get('/create', [\App\Http\Controllers\Admin\UserTpkController::class, 'create']);
		Route::get('/update/{id}', [\App\Http\Controllers\Admin\UserTpkController::class, 'update']);
	});
     
});

});

Route::get('/set_cookie', function () {
    $token = request('token');
    setcookie("access_tokenku", $token, time() + 86400);
    return redirect('/tpk/dashboard');
});

Route::get('/set_cookie_admin', function () {
    $token = request('token');
    setcookie("access_tokenku", $token, time() + 86400);
    return redirect('/administrator');
});