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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    Route::match(['get', 'post'], 'login', "AdminController@login");
    Route::match(['get', 'post'], 'register', "AdminController@register");
    Route::group(['middleware'=>['admin']], function(){
        Route::get('/dashboard', 'AdminController@dashboard');
        Route::match(['get', 'post'], '/change-password', 'AdminController@changePassword');
        Route::post('check-password', 'AdminController@checkPassword');
        Route::get('/logout', 'AdminController@logout');

        Route::get('tasks', 'TaskController@index');
        Route::match(['get', 'post'], 'add-edit-task/{id?}', 'TaskController@edit');
    });
});