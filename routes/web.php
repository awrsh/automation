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
Route::post('send_section','User\SectionController@Ajax')->name('section.ajax');
Route::post('send_basic','User\BasicController@Ajax')->name('basic.ajax');
// End Register Routes

Route::get('/Students/ImportData','User\MainController@ImportWithExcel')->name('Student.Excel');
Route::get('/Students/UploadPhoto','User\MainController@UploadPhoto')->name('Student.Photo');
Route::get('/Students/AlbumPhoto','User\MainController@AlbumPhoto')->name('Student.AlbumPhoto');
Route::get('/Students/List','User\MainController@ListStudents')->name('Student.List');
Route::get('/Students/EditStudent/{id?}','User\StudentsContorller@Student')->name('Student.EditStudent');
Route::get('/Students/EditClass','User\MainController@EditClass')->name('Student.EditClass');
Route::post('/Students/get_basics','User\MainController@GetBasics');
Route::post('/Students/get_classes','User\MainController@getClasses');
Route::post('/Students/view_classes','User\MainController@GetClassesForView');
Route::post('Students/EditClass/ShowClasses','User\MainController@showClasses')->name('Student.EditClassShow');
// End EditClasses Routes



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

Route::post('/Students/ExitClass','User\ClassificationController@ExitClass')->name('Student.ExitClass');
Route::post('/Students/EnterClass','User\ClassificationController@EnterClass')->name('Student.EnterClass');







Route::get('/AddDiscipline','User\MainController@Discipline')->name('Discipline.Add');


Route::post('/EditInfo','User\StudentsContorller@EditInfo')->name('Student.EditInfo');



Route::post('Students/Allbum_getClasses','User\AllbumController@getClasses')->name('Allbum.Classes');


//انظباطی
Route::post('Discipline/AddItem','User\Discipline\DisciplineController@AddCase')->name('Discipline.AddCase');

Route::get('discipline/student_chart','User\Discipline\DisciplineController@getChart');





Route::get('discipline/AddItems','User\Discipline\DisciplineController@AddCases')->name('Discipline.AddCases');
Route::post('discipline/AddItems','User\Discipline\DisciplineController@InsertCases')->name('Discipline.AddCases');


Route::get('discipline/AddPoints','User\Discipline\DisciplineController@AddPoints')->name('Discipline.AddPoints');


Route::post('discipline/InsertPoints','User\Discipline\DisciplineController@InsertPoints')->name('Discipline.InsertPoints');


Route::get('discipline/lists','User\Discipline\DisciplineController@DisciplineLists')->name('Discipline.lists');
Route::get('discipline/show/{id}','User\Discipline\DisciplineController@DisciplineShow')->name('Discipline.student.Show');

Route::get('discipline/DefineLow','User\Discipline\DisciplineController@DefineLow')->name('Discipline.defineLow');
Route::post('discipline/InsertLow','User\Discipline\DisciplineController@InsertLow')->name('Discipline.InsertLow');

Route::get('discipline/AbsenceAndDelayList','User\Discipline\DisciplineController@AbsenceAndDelayList')->name('Discipline.AbsenceAndDelayList');
Route::post('discipline/get_absenceAndDelayList','User\Discipline\DisciplineController@getAbsenceAndDelayList')->name('Discipline.get_absenceAndDelayList');


/*  مطالعات   */
Route::get('/Studing/StudyingModels','User\Studing\StudingController@StudyingModels')->name('Studing.StudyingModels');
Route::post('Studing/getStudyClasses','User\Studing\StudingController@getStudyClasses')->name('Studing.getStudyClasses');
Route::post('Studing/InsertStudy','User\Studing\StudingController@InsertStudy')->name('Studing.InsertStudy');

Route::get('/Studing/StudyingReport','User\Studing\StudingController@StudyingReport')->name('Studing.StudyingReport');
Route::post('Studing/getStudyingReport','User\Studing\StudingController@getStudyingReport')->name('Studing.getStudyingReport');

Route::get('/Studing/StudyingLessonsReport','User\Studing\StudingLessonController@StudyingLessonsReport')->name('Studing.StudyingLessonsReport');
Route::post('/Studing/StudyingLessonsReportList','User\Studing\StudingLessonController@StudyingLessonsReportList')->name('Studing.StudyingLessonsReportList');

Route::get('/Studing/StudyingReportList','User\Studing\StudingClassListController@StudyingReportList')->name('Studing.StudyingReportList');
Route::post('Studing/getStudyingReportList','User\Studing\StudingClassListController@getStudyingReportList')->name('Studing.getStudyingReportList');
Route::get('/Studing/StudyingReportList/{student}','User\Studing\StudingClassListController@StudyingReportListStudent')->name('Studing.StudyingReportListStudent');



/*  انتهای مطالعات    */