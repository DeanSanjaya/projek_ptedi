<?php

use App\Http\Controllers\PembelianController;
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
Route::get('/search_kategori','StokbarangController@search_kategori')->name('search_kategori');
Route::get('/kategori_ip/{id}','StokbarangController@kategori_ip');
Route::get('/pemasokip/{id}','PemasokController@pemasokip');

Route::group(['prefix' => 'dashboard', 'middleware' => [ 'user']], function () {
    Route::get('/main', 'WelcomeController@dashboard')->name('main');
    // Route::get('/manajemen', 'WelcomeController@manajemen')->name('manajemen');
    // Route::get('/pembelian', 'WelcomeController@pembelian')->name('pembelian');
    // Route::get('/pemasok', 'WelcomeController@pemasok')->name('pemasok');
    
    Route::post('/kategori','StokbarangController@kategori_store')->name('kategori_store');
    Route::post('/kategori/edit','StokbarangController@kategori_edit')->name('kategori.edit');
    Route::post('/kategori/destroy/{id}','StokbarangController@kategori_destroy')->name('kategori.destroy');

    Route::post('/merk','StokbarangController@merkbarang_store')->name('merkbarang_store');
    Route::post('/merk/edit','StokbarangController@merkbarang_edit')->name('merkbarang.edit');
    Route::post('/merk/destroy/{id}','StokbarangController@merkbarang_destroy')->name('merkbarang.destroy');

    
   
    Route::resource('pemasok','PemasokController');
    Route::resource('pembelian','PembelianController');
    Route::get('/profile','WelcomeController@profile') -> name('profile');

    Route::resource('karyawan', 'KaryawanController');

    

    // //Karyawan View
    // Route::get('/karyawan','KaryawanController@index')->name('karyawan.index');
    // //Karyawan Create
    // Route::get('/karyawan/create','KaryawanController@create')->name('karyawan.create');
    // Route::post('/karyawan/store','KaryawanController@store')->name('karyawan.store');
    // //Karyawan Update
    // Route::get('/karyawan/store/{id}','KaryawanController@edit')->name('karyawan.edit');
    // Route::post('/karyawan/update/{id}','KaryawanController@update')->name('karyawan.update');
    // //karyawan delete
    // Route::get('/karyawan/delete/{id}','KaryawanController@destroy')->name('karyawan.delete');



    Route::resource('barang','StokbarangController');

});