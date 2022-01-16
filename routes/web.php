<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Router;

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

Route::get('/dashboard', function () {
        return view('index');
});

Route::get('/','authcontroller@index')->name('login');
Route::post('login','authcontroller@login')->name('login');
Route::get('logout','authcontroller@logout')->name('logout');

Route::get('data','datacontroller@index');
Route::get('/tambah','datacontroller@tambah');
Route::post('/simpan','datacontroller@simpan');
Route::delete('/delete/{id}','datacontroller@delete')->name('data.delete');
Route::get('/data/{id}/edit','datacontroller@edit')->name('data.edit');
Route::patch('data/{id}','datacontroller@update')->name('data.update');
Route::get('data/{id}/profile','datacontroller@profile')->name('profile');

