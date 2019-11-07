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

Route::get('/','User\MainController@index')->name('BaseUrl');
Route::post('/Students/Register','User\MainController@Register')->name('Student.Register');
Route::get('/Students/ImportData','User\MainController@ImportWithExcel')->name('Student.Excel');
Route::get('/Students/UploadPhoto','User\MainController@UploadPhoto')->name('Student.Photo');
Route::get('/Students/AlbumPhoto','User\MainController@AlbumPhoto')->name('Student.AlbumPhoto');