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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/customer/login', 'CustomerLoginController@showLoginForm')->name('customer.loginform');
Route::get('/customer/register', 'CustomerLoginController@showRegisterForm')->name('customer.registerform');
Route::post('/customer/login', 'CustomerLoginController@login')->name('customer.login');
Route::post('/customer/register', 'CustomerLoginController@register')->name('customer.register');
Route::get('/customer/home', 'CustomerLoginController@index')->middleware('auth:customer');
Route::get('/customer/logout', 'CustomerLoginController@logout')->name('customer.logout');
