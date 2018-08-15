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

Route::group(['middleware' => ['guest']], function () {
Auth::routes();
});



Route::get('/home', 'HomeController@index')->name('home');


Route::get('admin/dashboard','AdminController@index');


Route::get('admin/login','Admin\LoginController@showLoginForm')->name('admin.login.link');
Route::get('admin/register','Admin\RegisterController@showRegistrationForm')->name('admin.register.link');

Route::post('register-admin','Admin\RegisterController@register')->name('admin.register');
Route::post('admin','Admin\LoginController@login')->name('admin.login');
Route::post('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/reset','Admin\ResetPasswordController@reset');
Route::get('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
