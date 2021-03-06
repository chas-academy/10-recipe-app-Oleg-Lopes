<?php

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
Route::get('/favorites', 'RecipesController@index');
Route::post('/favorites/add', 'RecipesController@store');
Route::delete('/favorites/delete/{id}', 'RecipesController@destroy');

Route::get('/auth', function(){
    if(Auth::check()) {
        return Auth::user();
    } else {
        return "false";
    }
});

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('r');
    } else {
        return redirect('login');
    }
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
