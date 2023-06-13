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
Route::get('/login', 'WelcomeController@login')->name('login');
Route::post('/login', 'WelcomeController@loginsubmit')->name('loginsubmit');
Route::get('/register', 'WelcomeController@register')->name('register');
Route::post('/register', 'WelcomeController@registersubmit')->name('registersubmit');
Route::get('/logout', 'WelcomeController@logout')->name('logout');
Route::post('/cari','WelcomeController@cari')->name('cari');
Route::get('/search_kategori', 'StokbarangController@search_kategori')->name('search_kategori');
Route::get('/kategori_ip/{id}', 'StokbarangController@kategori_ip');
Route::get('/pemasokip/{id}', 'PemasokController@pemasokip');
Route::get('/search_barang/{name}', 'KasirController@search_barang');
Route::get('/detail_barang/{id}', 'KasirController@detail_barang');
Route::get('/ip_grafik_pendapatan', 'WelcomeController@grafik_pendapatan')->name('ipgrafikjual');
Route::get('/pendapatan_bulan', 'WelcomeController@datapendapatan');
Route::get('/grafik_pembelian', 'WelcomeController@grafik_pembelian');
Route::get('/grafik_pembelian_bulan', 'WelcomeController@databulanpembelian');
Route::get('/grafikkaryawan', 'WelcomeController@datakaryawan');

Route::group(['prefix' => 'dashboard', 'middleware' => ['user']], function () {
    Route::get('/main', 'WelcomeController@dashboard')->name('main');

    Route::get('/download/all/pdf', 'DownloadController@all_report_pdf')->name('all_report_pdf');

    Route::get('/profile/email', 'ProfileController@email')->name('email');
    Route::post('/profile/email', 'ProfileController@email_store')->name('email.store');
    Route::get('/toko', 'ProfileController@toko')->name('toko.index');
    Route::post('/toko', 'ProfileController@toko_store')->name('toko.store');
    Route::post('/toko/update', 'ProfileController@toko_update')->name('toko.update');
    Route::get('/karyawan/{id}/buatakun', 'KaryawanController@set_user')->name('set_user');
    Route::post('/karyawan/buatakun', 'KaryawanController@buatakun')->name('buatakun');

    Route::post('/kategori', 'StokbarangController@kategori_store')->name('kategori_store');
    Route::post('/kategori/edit', 'StokbarangController@kategori_edit')->name('kategori.edit');
    Route::post('/kategori/destroy/{id}', 'StokbarangController@kategori_destroy')->name('kategori.destroy');

    Route::post('/merk', 'StokbarangController@merkbarang_store')->name('merkbarang_store');
    Route::post('/merk/edit', 'StokbarangController@merkbarang_edit')->name('merkbarang.edit');
    Route::post('/merk/destroy/{id}', 'StokbarangController@merkbarang_destroy')->name('merkbarang.destroy');

    Route::get('/kasir', 'KasirController@index')->name('kasir');
    Route::post('/kasir', 'KasirController@store')->name('kasir.store');
    Route::get('/kasir/riwayat','KasirController@riwayat')->name('kasir.riwayat');

    Route::resource('pemasok', 'PemasokController');
    Route::resource('pembelian', 'PembelianController');
    Route::resource('karyawan', 'KaryawanController');
    Route::resource('barang', 'StokbarangController');
    Route::resource('produksi', 'ProduksiController');
    Route::resource('profile', 'ProfileController');
});


Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin');
    Route::get('/alltoko', 'AdminController@alltoko')->name('alltoko');
    Route::get('/alluser', 'AdminController@alluser')->name('alluser');
});
