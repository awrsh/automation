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
Route::get('/','LoginController@index')->name('BaseUrl');
Route::post('/login','LoginController@login')->name('login');
Route::get('/Dashboard','User\MainController@index')->name('Dashboard');
Route::post('/Students/Register','User\MainController@Register')->name('Student.Register');
Route::get('/Students/ImportData','User\MainController@ImportWithExcel')->name('Student.Excel');
Route::get('/Students/UploadPhoto','User\MainController@UploadPhoto')->name('Student.Photo');
Route::get('/Students/AlbumPhoto','User\MainController@AlbumPhoto')->name('Student.AlbumPhoto');
Route::get('/Students/List','User\MainController@ListStudents')->name('Student.List');
Route::get('/Students/EditStudent/{id?}','User\StudentsContorller@Student')->name('Student.EditStudent');
Route::get('/Students/EditClass','User\MainController@EditClass')->name('Student.EditClass');
Route::post('/Students/ImportExel','User\StudentsContorller@import')->name('Student.importEx');
Route::post('/Students/Photo','User\StudentsContorller@setPhoto')->name('Student.setPhoto');
Route::post('/Students/Excel/Export','User\StudentsContorller@export')->name('Excel.export');
Route::get('/Students/deleteSes',function(){
 session()->forget('import_data');
 return redirect(route('Student.Excel'));
})->name('deleteSes');

Route::post('send_section','User\SectionController@Ajax')->name('section.ajax');

Route::post('send_basic','User\BasicController@Ajax')->name('basic.ajax');


/*  کلاس بندی   */
Route::get('/Students/AddSection','User\SectionController@AddSection')->name('Student.AddSection');
Route::post('/Students/SubmitSection','User\SectionController@InsertSection')->name('Student.SubmitSection');
Route::get('/Students/AddBasic','User\BasicController@AddBasic')->name('Student.AddBasic');
Route::post('/Students/SubmitBasic','User\BasicController@InsertBasic')->name('Student.SubmitBasic');
Route::get('/Students/AddClass','User\classificationController@AddClass')->name('Student.AddClass');
Route::post('/Students/SubmitClass','User\ClassificationController@InsertClass')->name('Student.SubmitClass');









Route::get('/AddDiscipline','User\MainController@Discipline')->name('Discipline.Add');



