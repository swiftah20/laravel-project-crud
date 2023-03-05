<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingsController;

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
    return view('main');
});

Route::get('home', function() {
    return view('layout.home', [
        "title" => "Home",
    ]);
});

Route::resource('/user-list', 'App\Http\Controllers\view\UserListController');

Route::resource('/profile-data', 'App\Http\Controllers\data\UserController');
Route::get('profile-data', 'App\Http\Controllers\data\UserController@getListUser')->name("get-list");
Route::get("profile-data/{id}", 'App\Http\Controllers\data\UserController@show')->name("get-detail-profile");

Route::resource('/settings', SettingsController::class);
