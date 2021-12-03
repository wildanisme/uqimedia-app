<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\MstProductController;
// use App\Http\Controllers\Admin\MstSatuanController;

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

Auth::routes();



Route::group(['prefix' => "admin", 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', 'AdminPanelAccess']], function () {

    Route::get('/', 'HomeController@index')->name('home');

    //Prefix ACL
    Route::prefix('acl')->group(function () {
        Route::resource('/users', 'UserController');
        Route::resource('/roles', 'RoleController');
        Route::resource('/permissions', 'PermissionController')->except(['show']);
    });

    //prefix Master
    Route::prefix('master')->group(function () {
        Route::resource('/satuan', 'MstSatuanController');
        Route::resource('/product', 'MstProductController');
        Route::resource('/pelanggan', 'MstPelangganController');
    });
});
