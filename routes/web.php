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
Route::get('/', 'LoginController@index')->name('BaseUrl');
Route::post('/login', 'LoginController@login')->name('login');
Route::get('/Dashboard', 'User\MainController@index')->name('Dashboard');
Route::post('/Students/Register', 'User\MainController@Register')->name('Student.Register');
Route::post('send_section', 'User\SectionController@Ajax')->name('section.ajax');
Route::post('send_basic', 'User\BasicController@Ajax')->name('basic.ajax');
// End Register Routes

Route::get('/Students/ImportData', 'User\MainController@ImportWithExcel')->name('Student.Excel');
Route::get('/Students/UploadPhoto', 'User\MainController@UploadPhoto')->name('Student.Photo');
Route::get('/Students/AlbumPhoto', 'User\MainController@AlbumPhoto')->name('Student.AlbumPhoto')->middleware('AdminL');
Route::get('/Students/List', 'User\MainController@ListStudents')->name('Student.List');
Route::get('/Students/EditStudent/{id?}', 'User\StudentsContorller@Student')->name('Student.EditStudent');
Route::get('/Students/EditClass', 'User\MainController@EditClass')->name('Student.EditClass');
Route::post('/Students/get_basics', 'User\MainController@GetBasics');
Route::post('/Students/get_classes', 'User\MainController@getClasses');
Route::post('Students/EditClass/ShowClasses', 'User\MainController@showClasses')->name('Student.EditClassShow');
// End EditClasses Routes

Route::post('/Students/ImportExel', 'User\StudentsContorller@import')->name('Student.importEx');
Route::post('/Students/Photo', 'User\StudentsContorller@setPhoto')->name('Student.setPhoto');
Route::post('/Students/Excel/Export', 'User\StudentsContorller@export')->name('Excel.export');
Route::get('/Students/deleteSes', function () {
    session()->forget('import_data');
    return redirect(route('Student.Excel'));
})->name('deleteSes');

Route::post('send_section', 'User\SectionController@Ajax')->name('section.ajax');

Route::post('send_basic', 'User\BasicController@Ajax')->name('basic.ajax');

/*  کلاس بندی   */
Route::get('/Students/AddSection', 'User\SectionController@AddSection')->name('Student.AddSection');
Route::post('/Students/SubmitSection', 'User\SectionController@InsertSection')->name('Student.SubmitSection');
Route::get('/Students/AddBasic', 'User\BasicController@AddBasic')->name('Student.AddBasic');
Route::post('/Students/SubmitBasic', 'User\BasicController@InsertBasic')->name('Student.SubmitBasic');
Route::get('/Students/AddClass', 'User\classificationController@AddClass')->name('Student.AddClass');
Route::post('/Students/SubmitClass', 'User\ClassificationController@InsertClass')->name('Student.SubmitClass');

Route::get('/AddDiscipline', 'User\MainController@Discipline')->name('Discipline.Add');

Route::get('/EditInfo', 'User\StudentsContorller@EditInfo')->name('Student.EditInfo');

Route::post('Students/Allbum_getClasses', 'User\AllbumController@getClasses')->name('Allbum.Classes');





Route::get('/Admin/Login', 'LoginController@Admin')->name('login.Admin');
Route::post('/Admin/Login', 'LoginController@loginAdmin')->name('login.checkAdmin');
Route::prefix('/Admin',)->middleware('AdminL')->group(function () {
    Route::get('/', 'Admin\MainController@index')->name('Admin.SchoolAdd');
    Route::get('/AddSchool', 'Admin\MainController@index')->name('Admin.SchoolAdd');
    Route::get('/ListSchool', 'Admin\MainController@ListSchool')->name('Admin.SchoolsList');
    Route::post('/School', 'Admin\Schools@AddSchool')->name('Admin.RegisterSchool');
});


Route::get('/Exercise/HomeWorksResponsible', 'User\ExerciseDailyController@AddResponsible')->name('Exercise.AddResponsible');
Route::get('/Exercise/HomeWorksResponsible', 'User\ExerciseDailyController@AddResponsible')->name('Exercise.AddResponsible');
