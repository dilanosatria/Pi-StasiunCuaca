<?php
use App\berita;
use App\komentar;
use App\stasiun;
use App\sortingkota;
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
    return view('index',
        [
            $statusaktif = 'Aktif',
            'beritacount' => berita::where('status','LIKE',"{$statusaktif}")->count(),
            'komentar' => komentar::orderBy('created_at','desc')->simplePaginate(5),
            'stasiun' => stasiun::where('status','LIKE',"{$statusaktif}")->get(),

            // $stasiun = stasiun::where('status','LIKE',"Aktif")->get(),
            'komentarcount' => komentar::count(),

            // 'kategori' => stasiun::with('children')->where('id_kota','=',1)->get()
            // 'menu' => sorting::with('stasiun')->get()
            'menu' => sortingkota::all()->load('stasiun')
        ]);
});

Route::get('/berita', function () {
    return view('berita',
        [
            $statusaktif = 'Aktif',
            'berita' => berita::where('status','LIKE',"{$statusaktif}")->orderBy('updated_at','desc')->get(),
            'beritacount' => berita::where('status','LIKE',"{$statusaktif}")->count()
        ]);
});

Route::get('/pengenalaniot', function () {
    return view('iot',
        [
            $statusaktif = 'Aktif',
            'berita' => berita::where('status','LIKE',"{$statusaktif}")->orderBy('updated_at','desc')->get(),
            'beritacount' => berita::where('status','LIKE',"{$statusaktif}")->count()
        ]);
});

Route::post("/storekomentar", 'KomentarController@store');
Route::post("/storepesan", 'PesanController@store');
Route::post("/storepesaniot", 'PesanController@storeiot');

// Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
    //Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    //Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Secure Routes
Route::group(['middleware' => ['auth']],function(){
    Route::get('admin/dashboard', 'DashboardController@index');

	Route::get('admin/pengguna', 'UserController@index');
    Route::get('/delete/akun/{id}', 'UserController@destroy');

	Route::get('admin/pesan', 'PesanController@index');
    Route::get('/delete/pesan/{id}', 'PesanController@destroy');
    Route::post('/delete', 'PesanController@destroyconfirmation');

    Route::get('admin/komentar', 'KomentarController@index');
    Route::get('/delete/komentar/{id}', 'KomentarController@destroy');
    Route::patch('/admin/komentar/update','KomentarController@update')->name('komentar.update');

    Route::get('admin/berita', 'BeritaController@indexberitaaktif');
    Route::get('admin/beritalama', 'BeritaController@indexberitanonaktif');
    Route::get('/delete/berita/{id}', 'BeritaController@destroy');
    Route::get('/delete/beritanonaktif/{id}', 'BeritaController@destroyberitanonaktif');
    Route::post('/admin/berita/store', 'BeritaController@save_data');
    Route::patch('/admin/berita/update','BeritaController@update')->name('berita.update');
    Route::patch('/admin/berita/update/status/aktif', 'BeritaController@updateaktif')->name('berita.aktif');
    Route::patch('/admin/berita/update/status/nonaktif','BeritaController@updatenonaktif')->name('berita.nonaktifkan');
    
    Route::get('admin/sortingkota', 'StasiunController@indexsorting');
    Route::get('/delete/kota/{id}', 'StasiunController@destroysorting');
    Route::patch('/admin/kota/update','StasiunController@updatesorting')->name('kota.update');
    Route::post('/admin/kota/store', 'StasiunController@save_datasorting');

    Route::get('admin/stasiun', 'StasiunController@indexstasiunaktif');
    Route::get('admin/stasiunnonaktif', 'StasiunController@indexstasiunnonaktif');
    Route::get('/delete/stasiun/{id}', 'StasiunController@destroy');
    Route::get('/delete/stasiunnonaktif/{id}', 'StasiunController@destroystasiunnonaktif');
    Route::post('/admin/stasiun/store', 'StasiunController@save_data');
    Route::patch('/admin/stasiun/update','StasiunController@update')->name('stasiun.update');
    Route::patch('/admin/stasiun/update/status/aktif', 'StasiunController@updateaktif')->name('stasiun.aktif');
    Route::patch('/admin/stasiun/update/status/nonaktif','StasiunController@updatenonaktif')->name('stasiun.nonaktifkan');
  
    Route::get('admin/stasiunfilemanager', 'FileController@stasiunindex');
    Route::get('admin/webfilemanager', 'FileController@webindex');
    Route::get('admin/uploadfile/peta', 'FileController@form')->name('peta.form');
    Route::post('admin/uploadfile/peta/upload', 'FileController@uploadpeta')->name('peta.upload');
    Route::post('admin/uploadfile/gauge/upload', 'FileController@uploadgauge')->name('gauge.upload');
    Route::post('admin/uploadfile/gambar/upload', 'FileController@uploadgambar')->name('gambar.upload');
    Route::get('/delete/file/{id}', 'FileController@destroy');

    Route::get('admin/bacadataiot', 'StasiunController@bacadataiot');

    Route::get('/home', function () {
    alert()->success('Sukses!', 'Berhasil Masuk! Selamat Datang Admin Stasiun Cuaca.');
    return redirect('/admin');
    });
});

Route::get('/admin', 'HomeController@index')->name('home');



