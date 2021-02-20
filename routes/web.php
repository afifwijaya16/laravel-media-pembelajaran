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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/perbaruipassword', 'HomeController@perbarui_password')->name('user.perbaruipassword');
Route::post('/perbaruipassword_new','HomeController@update')->name('user.perbaruipassword_new');
Route::post('/password_change', 'HomeController@password_change')->name('password_change');
Route::post('/user/logout', 'Auth\LoginController@logoutUser')->name('user.logout');
Route::get('/profil', 'UserprofilController@index')->name('profil');
Route::put('/update/profil/{id}', 'UserprofilController@update')->name('update.profil');

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');
    
    Route::get('/perbaruipassword', 'AdminController@perbarui_password')->name('admin.perbaruipassword');
    Route::post('/perbaruipassword_new','AdminController@update')->name('admin.perbaruipassword_new');

    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
    
    Route::get('/profil', 'ProfilController@index')->name('admin.profil.index');
    Route::get('/profil/{profil}', 'ProfilController@edit')->name('admin.profil.edit');
    Route::put('/profil/{profil}', 'ProfilController@update')->name('admin.profil.update');

    // siswa
    Route::put('/user/reset-password/{id}', 'UserController@resetPassword')->name('admin.user.resetPassword');
    Route::resource('/user','UserController'); 
    // guru
    Route::resource('/guru','GuruController');
    // kelas
    Route::resource('/kelas','KelasController');
    // mata pelajaran
    Route::resource('/mapel','MapelController');
});
