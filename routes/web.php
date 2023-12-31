<?php

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

//Route::get('/', function () {
//    return view('pages.home');
//})->name('home');

// Home
Route::get('/', 'App\Http\Controllers\Auth\LoginController@showSignInPage')->name('login');

// Sign In, Sign Up, Sign Out
Route::post('/doLogin', 'App\Http\Controllers\Auth\LoginController@doLogin');
Route::get('/signout', 'App\Http\Controllers\Auth\LogoutController@doLogout')->name('logout');

// Dashboard page
Route::group(['middleware' => ['webclientauth']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\Dashboard\DashboardController@showPage')->name('dashboard');
    Route::post('/dashboard', 'App\Http\Controllers\Dashboard\DashboardController@showPage')->name('dashboard');
    Route::get('/inputcompany', 'App\Http\Controllers\Dashboard\DashboardController@showInputPage');
    Route::post('/inputcompany', 'App\Http\Controllers\Dashboard\DashboardController@showInputPage');
    Route::post('/submitcompany', 'App\Http\Controllers\Dashboard\DashboardController@submitCompany');
});
Route::get('/event', function() {
    return view('pages.qr.signin');
});
Route::post('/event', function() {
    return view('pages.qr.signin');
});
Route::get('/event/login/{id}', 'App\Http\Controllers\Qr\QrController@doLogin')->name('dashboard');

Route::group(['middleware' => ['qrclientauth']], function () {
    Route::get('/event/{id}/dashboard', 'App\Http\Controllers\Qr\QrController@showInputPage');
    Route::post('/event/{id}/dashboard', 'App\Http\Controllers\Qr\QrController@showInputPage');
    Route::post('/event/{id}/submitcompany', 'App\Http\Controllers\Qr\QrController@submitCompany');
    Route::get('/event/{id}/after', 'App\Http\Controllers\Qr\QrController@uploadFile');
    Route::get('/event/{id}/noupload', 'App\Http\Controllers\Qr\QrController@NoUploadFile');
    Route::post('/event/{id}/upload', 'App\Http\Controllers\Qr\QrController@YesUploadFile');
});

// Route::middleware(['adminauth'])->prefix('admin')->group(function () {
//     Route::get('/token', 'App\Http\Controllers\Admin\TokenController@showPage')->name('admintoken');
//     Route::post('/token', 'App\Http\Controllers\Admin\TokenController@showPage')->name('admintoken');
// });

