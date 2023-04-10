<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'WelcomeController@index')->name('/');
// Route::get('/dashboard', 'WelcomeController@dashboard')->name('dashboard');
Route::get('/login','WelcomeController@login')->name('login');
Route::post('/login', 'WelcomeController@loginsubmit')->name('loginsubmit');
Route::get('/register','WelcomeController@register')->name('register');
Route::post('/register', 'WelcomeController@registersubmit')->name('registersubmit');
Route::get('/logout', 'WelcomeController@logout')->name('logout');

Route::group(['prefix' => 'dashboard', 'middleware' => [ 'user']], function () {
    Route::get('/', 'WelcomeController@dashboard')->name('dashboard');
    Route::get('/manajemen', 'WelcomeController@manajemen')->name('manajemen');

});